<!-- 
  * Programmer: Brittany Camarena
  * PHP code for handling user login
-->

<?php

require 'sendNotification/includes/dbConnect.php';

// variables
$username = $_POST['username'];
$password = $_POST['password'];

// check for unique username
if (Database::verifyLogin($username, $password)) {
    echo 'Valid login';
    $userInfo = Database::get_userInfo($username);
    session_start();
    $_SESSION['userID'] = $userInfo[0]['userID'];
    $_SESSION['name'] = $userInfo[0]['name'];
    $_SESSION['role'] = $userInfo[0]['role'];
} else {
    echo 'Error: Invalid login';
    header("HTTP/1.0 500 Internal Server Error");
    die();
}