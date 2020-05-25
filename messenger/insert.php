<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: ../");
    }
    require_once("../connection.php");

    //insert messages
    $userName = $_SESSION['username'];
    $time = time();

    if(isset($_POST['content'])){

        $mess = stripslashes(htmlspecialchars($_POST['content']));
        $content = $connection->escape_string ($mess);
        if(strlen($content)<1){
            die();
        }
        else{
            $statementInsert = "INSERT INTO messages VALUES(NULL,'$userName','$content','$time')";
            $query = $connection->query($statementInsert);
            if($query){
                echo <<<_END
                    <div class="cont">
                        <div class="message_send_container">
                            $mess
                            <div class="sender_arrow"></div>
                        </div>
                    </div>

                    
_END;
        }
            else{
                die($connection->error);
            }
        }
    }
?>