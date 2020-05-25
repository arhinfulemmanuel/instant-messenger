<?php
    session_start();  
    require_once("../connection.php");

    $userName = $_SESSION['username'];

    if(isset($_POST['logout'])){
        $deleteUserStatement = "DELETE FROM users WHERE username='$userName'";
        $deleteUser = $connection->query($deleteUserStatement);

        if($deleteUser){
            session_destroy();
            header("Location: ../");
        }
        else{
            echo $connection->error;
        }
    }

?>