<?php
require_once("../todoapp_scripts/script_dbConnection.php");
    

    function ShowPriority($priority, $taskId){
        if($priority == 1)
            echo "<span class=\"priority " . $taskId . "\">Low</span>";
        else if($priority == 2)
            echo "<span class=\"priority " . $taskId . "\">Medium</span>";
        else
            echo "<span class=\"priority " . $taskId . "\">High</span>";
    }

    function ShowLabels($labels, $taskId){
        if($labels == NULL)
            return;
        if(isset($labels)){
            $arrLabels = explode(',', $labels);
            foreach ($arrLabels as $label)
                echo "<span class=\"labels  " . $taskId . "\">" . $label . "</span> ";
            
        }
            
    }
?>
<?php

    
   
    //session_start();
    
    
    if(isset($_SESSION['loggedin'])){ 
        
        if($_SESSION['loggedin'] == true){
           
            
             
            if($link){

                //echo "<div class='create-bar'><h1>Welcome to your To-do List!</h1>
                //    <button onclick=" . "ExecNewTask(" . "'create-task'" . ");   >Create New Task</button>
                //</div><br />";
                
                $userName = $_SESSION['username'];
                $email = $_SESSION['email'];
                $userid = $_SESSION['userid'];
                $fetchQuery = "select * from tasks where userid = '$userid';";
                $result = mysqli_query($link, $fetchQuery);

                if($result){
                    
                    while($row = mysqli_fetch_array($result)){
                        $taskId = $row["taskid"];
                        $title = $row["title"];
                        $description = $row["description"];
                        $labels = $row["labels"];
                        $priority = $row["priority"];
                        
                        echo "<div class='tasklist'><div class='inside1'>";
                        echo "<span class=\"title ". $taskId . "\">" . $title . "</span> ";
                        ShowLabels($labels, $taskId);
                        echo "</div> <div class='inside2'>";
                        ShowPriority($priority, $taskId);

                        echo " | <a href='scripts/script_taskDelete.php?id=" . $taskId . "'><img src='images/trash-large.svg' /></a> ";
                        echo " <a href='javascript:void(0);' onclick=\"ExecNewTask('edit-task'," . $taskId . ");\"><img src='images/edit-small.svg' /></a> <br />";
                        echo "</div></div>";
                        //echo "<br />";
                        echo "<div class='description'><span class=\"desc " . $taskId . "\">" . $description . "</span></div>";
                        
                    }

                }

            }
            
            else{
                session_destroy();
                header('location: ../index.php?msg=3'); // Error for database connection 
            } 
            
            mysqli_close($link);


        }
        else{
            
            header('location: ../index.php'); // session not started or ended */
        } 
    }
    else{
            
            header('location: ../index.php'); // session not started or ended
    }



?>