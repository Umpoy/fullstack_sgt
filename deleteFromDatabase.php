<?php
    session_start();
    $user_id = $_SESSION["id"];
    include("connect.php");
    if(array_key_exists("id", $_POST)){
        $query = "DELETE FROM `post` WHERE `id` = '".mysqli_real_escape_string($conn, $_POST['id'])."'";
        print $query;
        mysqli_query($conn, $query);
    }
?>