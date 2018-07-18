<?php
    $username = $_POST['username'];
    $pass = $_POST['password']; 
    if(array_key_exists("submit", $_POST)){
        echo $username . " " . $pass;
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
    <form method="post">
        <input type="text" name="username" placeholder=" Enter Username">
        <input type="password" name="password" placeholder="Enter Password">
        <input type="submit" name="submit">
    </form>
</body>
</html>

