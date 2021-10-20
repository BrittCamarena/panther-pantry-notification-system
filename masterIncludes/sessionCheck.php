<?php
/*
Programmer: Brittany Camarena
Date: 11/17/2020
Code Overview: Checks if session data exists
*/

session_start();
if (!isset($_SESSION['userID'])) {
    header("Location: accessDenied.php");
    die();
}

?>