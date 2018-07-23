<?php
    session_start();
    $user_id = $_SESSION["id"];
    include("connect.php");
    if(array_key_exists("name", $_POST) && array_key_exists("course", $_POST) && array_key_exists("grade", $_POST)){
        $query = "INSERT INTO `post`(`user_id`, `s_name`, `s_course`, `s_grade`) VALUES ('".mysqli_real_escape_string($conn, $user_id)."', '".mysqli_real_escape_string($conn, $_POST["name"])."', '".mysqli_real_escape_string($conn, $_POST["course"])."', '".mysqli_real_escape_string($conn, $_POST["grade"])."')";
        mysqli_query($conn, $query);
    }
?>
