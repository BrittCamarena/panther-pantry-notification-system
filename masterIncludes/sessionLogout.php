<?php
/*
Programmer: Brittany Camarena
Date: 11/17/2020
Code Overview: Clears and destroys session data
*/

session_start();
session_unset();
session_destroy();
?>