<?php
    session_start();
    require_once("connect.php");
    $error = '';
    $username = $_POST['username'];
    $pass = $_POST['password']; 
    if(array_key_exists("signup", $_POST)){
        $query = "SELECT id FROM `users` WHERE username = '".mysqli_real_escape_string($conn, $_POST['username'])."' LIMIT 1";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
            $error = "That email address is taken.";
        } else {
            $query = "INSERT INTO `users` (`username`, `password`) VALUES ('".mysqli_real_escape_string($conn, $_POST['username'])."', '".mysqli_real_escape_string($conn, $_POST['password'])."')";            
            if(!mysqli_query($conn, $query)){
                $error = "<p>Could not sign you up - please try again later.</p>";
            } else {
                $query = "UPDATE `users` SET password = '".md5(md5(mysqli_insert_id($conn)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($conn)." LIMIT 1";
                mysqli_query($conn, $query);
                $_SESSION['id'] = mysqli_insert_id($conn);
                setcookie("id", mysqli_insert_id($conn), time() + 60*60*24*365);
                readfile("loggedin.php");
            }
        }
    }
?>
<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <meta name="viewport" content="initial-scale=1, user-scalable=no">
</head>
<body> 
    <div id="error"><?php echo $error ?></div>
    <form method="post" id="signup">
        <input type="text" name="username" placeholder=" Enter Username">
        <input type="password" name="password" placeholder="Enter Password">
        <input type="submit" name="signup">
    </form>
    <form method="post" id="login">
        <input type="text" name="username" placeholder=" Enter Username">
        <input type="password" name="password" placeholder="Enter Password">
        <input type="submit" name="login">
    </form>
</body>
</html>

