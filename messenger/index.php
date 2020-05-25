
<?php
    session_start();  

    if(!isset($_SESSION['username'])){
        header("Location: ../");
    }
    require_once("../connection.php");
    require_once("index.html");


    $userName = $_SESSION['username'];
    
/*
    if(isset($_POST['logout'])){
        $deleteUserStatement = "DELETE FROM users WHERE username='$userName'";
        $deleteUser = $connection->query($deleteUserStatement);

        if($deleteUser){
            session_destroy();
            header("Location: ../");
        }
    }

*/



    


?>