<?php
    session_start();
    include("connect.php");
    $user_id = $_SESSION["id"];
    // if(array_key_exists("data", $_POST)){
        //stuff
        //$query = "SELECT * FROM `post` WHERE user_id = ".mysqli_real_escape_string($conn, $user_id)." LIMIT 1";
        $query = "SELECT `s_name`, `s_course`, `s_grade` FROM `post` WHERE user_id = $user_id";
        // $row = mysqli_query($conn, $query);
      
        $json = array();
        $result = mysqli_query ($conn, $query);
        while($row = mysqli_fetch_array ($result))     
        {
            $server = array(
                'name' => $row['s_name'],
                'course' => $row['s_course'],
                'grade' => $row['s_grade']
            );
            array_push($json, $server);
        }
        
        $jsonstring = json_encode($json);
        echo $jsonstring;
        
        die();
    // }

?>