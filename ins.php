<?php
    $connection = new mysqli("sql104.epizy.com","epiz_24028226","kofibusy","epiz_24028226_pernchat");

    $userName = $_GET['username'];
    $time = $_GET['time'];
    $statement = "SELECT * FROM users WHERE username='$userName'";
    $query = $connection->query($statement);
    $row = $query->num_rows;
    if($row>0){
        echo json_encode(array(
            "proceed"=>"false"
        ));
    }
    else if($row<1){
        $insert="INSERT INTO users VALUES('$userName','$time')";
        $queryInsert=$connection->query($insert);
        if($queryInsert){
                echo json_encode(array(
                "proceed"=>"true",
            ));
        }
    }
?>