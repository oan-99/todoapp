<?php
require_once("../../todoapp_scripts/script_dbConnection.php");
    
    function GetLabels($labels){
        if(isset($labels))
            return $labels;
        
        $labels = "NULL";
        return $labels;
            
    }
?>
<?php

    
   
    session_start();
    
    
    if(isset($_SESSION['loggedin'])){ 
        
        if($_SESSION['loggedin'] == true){
           
            
             
            if($link){

                $title = $_POST['taskTitle'];
                $priority = $_POST['priority'];
                $labels = $_POST['labels'];
                $description = $_POST['description'];
                $taskId = $_POST['taskid'];
                
                $userid = $_SESSION['userid'];
                $updateQuery = "update tasks set title = '" . $title . "'," . 
                "priority = " . $priority . ", labels = '" . $labels . "'," . 
                "description = '" . $description . "'" . 
                " where userid = ".  $userid . " and taskid = " . $taskId . ";";

                $result = mysqli_query($link, $updateQuery);

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