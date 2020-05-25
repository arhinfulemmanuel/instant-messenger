<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: ../");
    }

    require_once("../connection.php");
    $userName = $_SESSION['username'];

    //fetch user
    $fetchUser = "SELECT * FROM users WHERE username='$userName'";
    $user = $connection->query($fetchUser);
    $userRow = $user->fetch_array(MYSQLI_NUM);
    $time = $userRow[1];

        //fecthing messages

    $fecthMessage = "SELECT * FROM messages ORDER BY id ASC";
    $query = $connection->query($fecthMessage);
    $row = $query->num_rows;

    for($i=0; $i<$row; $i++){
        $data = $query->fetch_array(MYSQLI_NUM);




        if($data[3]>$time){




        if($data[1]==$userName){
            echo <<<_END

                <div class="cont">
                    <div class="message_send_container">
                        $data[2]
                        <div class="sender_arrow"></div>
                    </div>
                </div>
_END;
        }

        else{
            echo <<<_END
                <div class="message_recieve_container">
                    <div class="message_recieve_container_main">
                       $data[2]
                    </div>
                    <div class="reciever_arrow"></div>
                    <div class="sender_name_container"><small>$data[1]</small></div>
                </div>
_END;
        }

    echo <<<_END
        <script>
        </script>
_END;
    }
}



//update online users
    $fetchAllUsers = "SELECT * FROM users";
    $allUSers = $connection->query($fetchAllUsers);
    $users = $allUSers->num_rows;
    $onlineUsers = $users-1;
    echo <<<_END
    <script>
        $('#online_users').show().html($onlineUsers);
    </script>
_END
?>