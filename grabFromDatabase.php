<?php
    session_start();
    include("connect.php");
    $user_id = $_SESSION["id"];
    $query = "SELECT `id`, `s_name`, `s_course`, `s_grade` FROM `post` WHERE user_id = $user_id";
    $json = array();
    $result = mysqli_query ($conn, $query);
    while($row = mysqli_fetch_array ($result)){
        $server = array(
            'id' => $row['id'],
            'name' => $row['s_name'],
            'course' => $row['s_course'],
            'grade' => $row['s_grade']
        );
        array_push($json, $server);
    }
    
    $jsonstring = json_encode($json);
    echo $jsonstring;
    die();
?>