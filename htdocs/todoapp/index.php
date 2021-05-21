<!DOCTYPE html>
<html>

    <head>
        <title>Sign in | ToDo App</title>
        <style>
            body {
                background: #FAFAFA 0% 0% no-repeat padding-box;
                opacity: 1;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100vh;
                width: 100vw;
                margin: 0;
               
            }

            #main-box {
                background: #FFFFFF 0% 0% no-repeat padding-box;
                box-shadow: 0px 1px 3px #00000029;
                border-radius: 6px;
                opacity: 1;
                padding: 2em;
                margin: auto;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;

            }

            .error {
                color: red;
                height: 2em;
            }

            #main-box form {
                padding: 2em 0.5em;
                
            }

            #main-box label, #main-box input {
                margin: 1em;
            }

        </style>
    </head>

    <body>


        




        <div id="main-box">
            <img src='images/to-do-green.svg'/>

            <!-- PHP Code for message displaying starts here -->

            <?php

                if(isset($_GET['msg'])){
                    $msg = $_GET['msg'];
                    if($msg == 1)
                        echo "<p class='error'>You are now registered. Sign in to start using the app.</p>";
                    if($msg == 2)
                        echo "<p class='error'>Incorrect username or password. If you do not have an account, sign up.</p>";
                    if($msg == 3)
                        echo "<p class='error'>Database connection error. Try later.</p>";

                    $_GET['msg'] = '';
                }

            ?>

    <!-- PHP Code for message displaying ends here -->

            <form action="scripts/script_signin.php" method="POST">
                
                <label for="uname">Username: </label> <br />
                <input type="text" name="usrname" id="uname" /> <br />
                
                <label for="pswd">Password: </label> <br />
                <input type="password" name="passcode" id="pswd" /> <br />

                <input type="submit" value="Sign in" /> <br />
                <p>Don't have an account: <a href="signup.php">Sign Up</a>.</p> <br />

            </form>
        </div>
    </body>

</html>