<?php

    //during a development environment, uncomment the following line. It turns off all kinds of error reporting.
    //error_reporting(0);

    $dbServer = 'localhost';
    $dbUsername = 'root';
    $dbPass = '';
    $dbName = 'todoapp';

    $link = mysqli_connect($dbServer, $dbUsername, $dbPass, $dbName);
    
    

?>