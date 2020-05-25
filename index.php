<?php
    session_start();
    if(isset($_SESSION['username'])){
        header("Location: messenger/");
    }
    require_once("index.html");
    require_once("connection.php");

    if(!$connection){
        die($connection->error);
    }

    if(isset($_POST['submit'])){
        $time = time();
        $userName = stripslashes(htmlspecialchars($_POST['username']));

        $statement = "SELECT * FROM users WHERE username='$userName'";
        $query = $connection->query($statement);


        $insert = $connection->prepare("INSERT INTO users VALUES(?,?)");
        $insert->bind_param("ss", $userName, $time);

        
        $row = $query->num_rows;

        if($userName==""){
            echo "<script> $('.username_error_container').html('Username cannot be empty').show(); </script>";
        }
        else{
            if($row == 1){
                echo "<script> $('.username_error_container').show(); </script>";
            }

            else{
                $_SESSION['username'] = $userName;
                $insert->execute();
                header("Location: messenger/");
            }
        }
        
    }
?>