<!-- 
Programmer: Brittany Camarena
Date: 11/17/2020
Code Overview: Public login index
-->

<?php
session_start();
if (isset($_SESSION['userID'])) {
    header("Location: portal.php");
}
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='author' content='Brittany Camarena'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='sendNotification/css/styles.css'>
    <script src='sendNotification/scripts/login.js'></script>
    <!-- PHP included head styles/scripts -->
    <?php include_once("masterIncludes/head.php"); ?>
    <title>Login</title>
</head>

<body>
  <!-- PHP included navigation bar-->
  <?php include_once("masterIncludes/navigation.php"); ?>
  
    <div class='container'>
        <div id='login-card' class='card'>

            <div class='header'>
                <h2 id='cardTitle'>Welcome!</h2>
            </div>

            <div class='card-body'>
                <p style="color: red;">User registration has been removed to prevent server abuse.</p>                    
                <span style="font-weight: bold;">Subscriber:</span>
                <p>
                    Username: janedoe
                    <br>
                    Password: password
                </p>
                <span style="font-weight: bold;">Manager:</span>
                <p>
                    Username: johnsmith
                    <br>
                    Password: password
                </p>

                <div id='loginPanel'>
                    <form id='loginForm' action='' method='post'>
                        <div class='form-group'>
                            <input type='name' class='form-control inputGrey' id='usernameField' placeholder='username' name='username'>
                        </div>
                        <div class='form-group'>
                            <input type='password' class='form-control inputGrey' id='passwordField' placeholder='password' name='password'>
                        </div>
                        <div id='buttonDiv'>
                            <button type='submit' id='loginButton' class='btn btn-primary Button'>Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>