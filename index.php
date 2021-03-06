<?php
    session_start();
    require_once("connect.php");
    $error = '';
    if(array_key_exists("logout", $_GET)){
        unset($_SESSION);
        setcookie("id", "", time() - 60*60);
        $_COOKIE["id"] = "";
    } else if((array_key_exists("id", $_SESSION) AND $_SESSION['id']) OR (array_key_exists("id", $_COOKIE) AND $_COOKIE["id"])){
        echo "";
    }
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
                readfile("loggedin.php");
            }
        }
    }
    if(array_key_exists("login", $_POST)){
        $query = "SELECT * FROM `users` WHERE username = '".mysqli_real_escape_string($conn, $_POST['username'])."'";       
            $result = mysqli_query($conn, $query);        
            $row = mysqli_fetch_array($result);        
            if (isset($row)) {                
                $hashedPassword = md5(md5($row['id']).$_POST['password']);                
                if ($hashedPassword == $row['password']) {                    
                    $_SESSION['id'] = $row['id'];
                    readfile("loggedin.php");                        
                } else {                    
                    $error = "That username/password combination could not be found.";                    
                }                
            } else {                
                $error = "That username/password combination could not be found.";                
            }
    }
    if(array_key_exists("post", $_POST)){
        echo "good";
    }
    if(array_key_exists("id", $_COOKIE) && $_COOKIE['id']){
        $_SESSION['id'] = $_COOKIE['id'];
        readfile("loggedin.php"); 
    }
?>
<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="initial-scale=1, user-scalable=no">
    <title>Student Grade Table</title>
</head>
<body>
    <?php
        if(!isset($_SESSION['id'])){
            include("form.php");
        }
    ?>
    <script src="js/script.js"></script>
</body>
</html>