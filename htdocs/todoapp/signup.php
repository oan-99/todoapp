<!DOCTYPE html>
<html>

    <head>
        <title>Sign Up | ToDo App</title>
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


            <!-- PHP Code for error & login displaying starts here -->

            <?php

            if(isset($_GET['err'])){
                $err = $_GET['err'];
                if($err == 1)
                    echo "<p class ='error'>Username or email already registered.</p>";
                else if ($err == 2)
                    echo "<p class ='error'>Database connection. Try again later.</p>";
                $_GET['err'] = '';
            }

            ?>


            <!-- PHP Code for error & login displaying ends here -->


            <form action="scripts/script_createAccount.php" method="post">
                
                <label for="uname">Username: </label> <br />
                <input type="text" name="usrname" id="uname" onkeyup="userNameCheck();" /> <br />

                <label for="email_address">Email: </label> <br />
                <input type="text" name="email" id="email_address" /> <br />
                
                <label for="pswd">Password: </label> <br />
                <input type="password" name="passcode" id="pswd" onkeyup="passWordMatch();" /> <br />

                <label for="pswdC">Confirm Password: </label> <br />
                <input type="password" name="passcodeC" id="pswdC" onkeyup="passWordMatch();" /> <br />

                <input type="submit" value="Create Account" /> <br />
                <p>Already have an account: <a href="index.php">Sign In</a>.</p> <br />

            </form>
        </div>


        <script type="text/javascript">
            //this function checks whether the function contains matching passwords
            var passWordMatch = function() {
                if(document.getElementById('pswd').value == document.getElementById('pswdC').value
                && document.getElementById('pswd').value.length > 0
                && document.getElementById('pswdC').value.length > 0) {
                    document.getElementById('pswd').style.color = 'green';
                    document.getElementById('pswdC').style.color = 'green';
                }
                else {
                    document.getElementById('pswd').style.color = 'red';
                    document.getElementById('pswdC').style.color = 'red';
                }

            }

            //this function checks whether username is upto 10 characters or not
            var userNameCheck = function() {
                $length = document.getElementById('uname').value.length;
                
                if($length > 0 && $length < 11)
                    document.getElementById('uname').style.color = 'green';
                    
                else 
                    document.getElementById('uname').style.color = 'red';
                
            }

        </script>

    </body>

</html>




