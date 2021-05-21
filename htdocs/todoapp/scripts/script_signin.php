<?php

    require_once "../../todoapp_scripts/script_dbConnection.php";

    if($link){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $usrName = $_POST['usrname'];
            $password = $_POST['passcode'];
            $fetchQuery = "select * from users where username = '" . $usrName . "' and pass = md5('" . $password . "');";
            $myfile = fopen("name.txt", "w");
            fwrite($myfile, $fetchQuery);
            fclose($myfile);
            //echo $fetchQuery;
            $result = mysqli_query($link, $fetchQuery);
            if($result){
                $row = mysqli_fetch_array($result);
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['userid'] = $row['userid'];
                mysqli_close($link);
                header('location: ../todolist.php'); // route to tasks
            }
            else {
                mysqli_close($link);
                header('location: ../index.php?msg=2'); // no user or email found
            }

        }
    }
    else{
        header('location: ../index.php?msg=3'); // Error for database connection 
    }

   

?>