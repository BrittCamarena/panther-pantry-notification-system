<?php
/*
Programmer: Brittany Camarena
Date: 11/17/2020
Code Overview: Checks if user is a manager
*/

if ($_SESSION['role'] != "Manager") {
    header("Location: accessDenied.php");
    die();
}
?>