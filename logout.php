<!--
Programmer: Brittany Camarena
Date: 10/28/2020
Code Overview: Shows logout page to user
-->

<?php
// Redirect to login page after 5 seconds
header("refresh:5; url=index.php");
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='author' content='Lief J Cain & Brittany Camarena'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='masterStyles/masterStyles.css'>
    <!-- PHP included head styles/scripts -->
    <?php include_once("masterIncludes/head.php"); ?>
    <title>Send Notification</title>
</head>

<body>

<!-- PHP included navigation bar-->
<?php include_once("masterIncludes/navigation.php"); ?>

<div class='container'>
    <div id='login-card' class='card'>
        <div class='header'>
            <h2 id='cardTitle'>Logged Out</h2>
        </div>
        <div class='card-body'>
            <br/>
            <h4><center>You have been logged out of your account.</center></h4>
            <p><center>This page will redirect automatically.</center></p>
        </div>
    </div>
</div>

</body>
</html>