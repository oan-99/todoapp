<?php
require_once("../../todoapp_scripts/script_dbConnection.php");
    
   
    session_start();
    
    
    if(isset($_SESSION['loggedin'])){ 
        
        if($_SESSION['loggedin'] == true){
           
            
             
            if($link){

                $taskId = $_GET['id'];
                $userid = $_SESSION['userid'];
                $deleteQuery = "delete from tasks where taskid = ". $taskId . " and userid = " . $userid . ";";
                $result = mysqli_query($link, $deleteQuery);

                if($result){
                    mysqli_close($link);
                    header('location: ../todolist.php');
                }

                

            }
            
            else{
                mysqli_close($link);
                session_destroy();
                header('location: ../index.php?msg=3'); // Error for database connection 
            } 
            
            mysqli_close($link);
            header('location: ../todolist.php');

        }
        else{
            session_destroy();
            header('location: ../index.php'); // session not started or ended */
        } 
    }
    else{
            session_destroy();
            header('location: ../index.php'); // session not started or ended
    }



?>