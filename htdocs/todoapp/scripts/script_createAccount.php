<?php

    require_once "../../todoapp_scripts/script_dbConnection.php";

    if($link){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $usrName = $_POST['usrname'];
            $email = $_POST['email'];
            $password = $_POST['passcode'];
            $insertQuery = "insert into users (username, email, pass) values ('$usrName', '$email', MD5('$password'));";
            if(mysqli_query($link, $insertQuery)){
                header('location: ../index.php?msg=1'); // Account is created, route to sign in page
            }
            else {
                header('location: ../signup.php?err=1'); // Error: either email or username is already taken
            }

        }
    }
    else{
        header('location: ../signup.php?err=2'); // Could not connect to database
    }

    mysqli_close($link);

?>