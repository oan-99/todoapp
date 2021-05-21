<?php
    session_start();
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Dashboard | ToDo App</title>
        <style>


            body {
                background: #FAFAFA 0% 0% no-repeat padding-box;
                opacity: 1; 
                
            }

            #top-bar {
                display: flex;
                top: 0px;
                width: 100%;
                height: 5em;
                margin-bottom: 2em;
                justify-content: space-between;
                align-items: center;
                background: #26A69A 0% 0% no-repeat padding-box;
                opacity: 1;
                
            }

            #top-bar img {
                margin: auto;
                margin-left: 2em;
            }

            #top-bar button {
                margin: auto;
                margin-right: 2em;
            }

            .tasklist {
                display: flex;
                width: 94%;
                height: 5em;
                background: #FFFFFF 0% 0% no-repeat padding-box;
                box-shadow: 0px 1px 3px #00000029;
                border-radius: 6px;
                opacity: 1;
                margin: auto;
                margin-bottom: 0;
                justify-content: space-between;
                
            }

            .inside1 {
                margin: auto;
                margin-left: 1em;
            }

            .inside2 {
                margin: auto;
                margin-right: 1em;
            }

            .tasklist .labels {
                background: #434343 0% 0% no-repeat padding-box;
                border-radius: 2px;
                opacity: 1;
                color: white;
                padding: 0.1em 0.6em;
                font-size: 0.8em;
                margin-left: 0.5em;
                
            }

            .description {
                display: flex;
                width: 94%;
                
                background: #434343 0% 0% no-repeat padding-box;
                box-shadow: 0px 1px 3px #00000029;
                border-radius: 6px;
                justify-content: left;
                align-items: center;
                opacity: 1;
                margin: auto;
                margin-top: 0;
                margin-bottom: 2em;
                
            }

            .desc {
                color: white;
                padding-top: 1em;
                margin-left: 1em;
                margin-bottom: 2em;
                
            }

            .tasklist .title {
                font-size: 1.2em;
                font-weight: bold;
            }

            .create-bar {
                display: flex;
                width: 94%;
                height: 5em;
                background: #FAFAFA 0% 0% no-repeat padding-box;
                opacity: 1;
                margin: auto;
                margin-top: 100px;
                margin-bottom: 2em;
                justify-content: space-between;
                
            }

            .create-bar button {
                color: white;
                background: #26A69A 0% 0% no-repeat padding-box;
                box-shadow: 0px 2px 4px #00000029;
                border-radius: 4px;
                opacity: 1;
                padding: 1em;
            }

            #signout-btn {
                color: white;
                font-weight: bold;
                font-size: 1.3em;
                border-radius: 4px;
                opacity: 1;
                padding: 1em;
                text-decoration: none;
            }

            #create-task form {
                background: #FAFAFA;
                height: 40%;
                opacity: 1;
                margin-top: 10%;
                padding: 1em;
                justify-content: left;
                margin-left: 1em;
                align-items: center;
            }
            
            #edit-task form {
                background: #FAFAFA;
                height: 40%;
                opacity: 1;
                margin-top: 10%;
                padding: 1em;
                justify-content: left;
                margin-left: 1em;
                align-items: center;
            }


        </style>
    </head>

    <body>

        
        

        <div id="edit-task" style="display: none;">
            <form action="scripts/script_editTask.php" method="post" style="opacity: 1;">
                    
                    <label for="eform_taskTitle">Task Title: </label> <br />
                    <input type="text" name="taskTitle" id="eform_taskTitle" onkeyup="CheckCreateTask('editTaskSubmit');" /> <br />
    
                    <label for="eform_priority">Priority: </label> <br />
                    <select name='priority' id='eform_priority' >
                        <option value=0>Low</option>
                        <option value=1>Medium</option>
                        <option value=2>High</option>
                    </select><br />
    
                    <label for="eform_labels">Labels: </label> <br />
                    <input type="text" name="labels" id="eform_labels" placeholer="Write labels separated by comma" /> <br />

                    <label for="eform_description">Description: </label><br />
                    <textarea id='eform_description' name='description' rows='5' cols='80' onkeyup="CheckCreateTask('editTaskSubmit');"></textarea><br />
                    
                    <input type="hidden" name="taskid" id="hiddenInput"/>
    
                    <input type="submit" value="Edit Task" id="editTaskSubmit" /> <br />
                    
                    
                </form>
                <button onclick="CreateTaskBack();">Back</button>
        </div>

        <div id="top-bar">
                <img src='images/to-do.svg' />
                <a href='scripts/script_logout.php' id='signout-btn'>Sign out</a>
        </div>

        <div class='create-bar'><h1>Welcome to your To-do List!</h1>
            <button onclick="ExecNewTask('create-task');">Create New Task</button>
        </div><br />


        <!-- PHP Code for tasks listing -->
        <div id="list-tasks">
            
            <?php  include("scripts/script_tasksListings.php"); ?>
        </div>
        

        <div id="create-task" style="display: none;">

        
            <form action="scripts/script_CreateTask.php" method="post" style="opacity: 1;">
                 
                 <label for="form_taskTitle">Task Title: </label> <br />
                 <input type="text" name="taskTitle" id="form_taskTitle" onkeyup="CheckCreateTask('createTaskSubmit');" /> <br />
 
                 <label for="form_priority">Priority: </label> <br />
                 <select name='priority' id='form_priority' >
                     <option value=0>Low</option>
                     <option value=1>Medium</option>
                     <option value=2>High</option>
                 </select><br />
 
                 <label for="form_labels">Labels: </label> <br />
                 <input type="text" name="labels" id="form_labels" placeholer="Write labels separated by comma" /> <br />

                 <label for="form_description">Description: </label><br />
                 <textarea id='form_description' name='description' rows='5' cols='80' onkeyup="CheckCreateTask('createTaskSubmit');"></textarea><br />
                 
                 
 
                 <input type="submit" value="Create Task" id="createTaskSubmit" disabled /> <br />
                 
                 
            </form>
            <button onclick="CreateTaskBack();">Back</button>
        
        </div>

        



    <script type="text/javascript">

        ExecNewTask = function (idName, idNum = 0) {
            var elem = document.getElementById(idName);
            elem.style.display = 'flex';
            elem.style.width = '100%';
            elem.style.height = '100%';
            elem.style.position = 'absolute';
            elem.style.top = '0';
            elem.style.bottom = '0';
            elem.style.zIndex = '10';
            elem.style.background = '#434343';
            elem.style.opacity = '0.7';
            elem.style.flexDirection = 'column';
            elem.style.justifyContent = 'center';
            elem.style.alignItems = 'center';

            if(idName == "edit-task"){ // fills up the forms
                var elemList = document.getElementsByClassName(idNum); // getting required task id content
                document.getElementById("hiddenInput").value = idNum;
                for(var i = 0; i < elemList.length; i++){
                    
                    if(elemList[i].classList[0] == "title")
                    document.getElementById('eform_taskTitle').value = elemList[i].innerHTML; // filling the title
                    
                    else if(elemList[i].classList[0] == "labels"){
                        if(i == 1)
                            document.getElementById('eform_labels').value += elemList[i].innerHTML; // filling labels
                        else
                            document.getElementById('eform_labels').value += ", " + elemList[i].innerHTML; // filling labels
                    }
                    else if(elemList[i].classList[0] == "priority"){
                        if(elemList[i].innerHTML == "High")
                            document.getElementById('eform_priority').value = 2; // filling priority
                        else if(elemList[i].innerHTML == "Medium")
                            document.getElementById('eform_priority').value = 1; // filling priority
                        else
                            document.getElementById('eform_priority').value = 0; // filling priority
                    }
                        

                    else if(elemList[i].classList[0] == "desc")
                        document.getElementById('eform_description').value = elemList[i].innerHTML; // filling priority
                }
            }
            
        }


        CheckCreateTask = function (idName) {
            var elemSub = document.getElementById(idName);
            pretext = "";
            if(idName == "createTaskSubmit")
                pretext = "form_";
            else
                pretext = "eform_";

            if(document.getElementById(pretext + "taskTitle").value.length > 0 && document.getElementById(pretext + "description").value.length > 0)
                elemSub.disabled = false;        
            else
                elemSub.disabled = true;
            
        }


        CreateTaskBack = function () {
            location.reload(true);
        }





    </script>

    </body>

</html>