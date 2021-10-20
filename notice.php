<!--
Programmer: Brittany Camarena
Date: 11/17/2020
Code Overview: Alerts visitors of access restriction
-->

<?php
session_start();
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='author' content='Brittany Camarena'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='masterStyles/masterStyles.css'>
    <!-- PHP included head styles/scripts -->
    <?php include_once("masterIncludes/head.php"); ?>
    <title>Panther Pause</title>
</head>

<body>

<!-- PHP included navigation bar-->
<?php include_once("masterIncludes/navigation.php"); ?>

<div class='container'>
    <div id='login-card' class='card'>
        <div class='header'>
            <h2 id='cardTitle'>Panther Pause!</h2>
        </div>
        <div class='card-body'>
            <br/>
            <h4><center>In respect of my classmate's work, I will not showcase their sections without permission.</center></h4>
            <p><center>Click the Panther Pantry logo to return to the main portal.</center></p>
        </div>
    </div>
</div>

</body>
</html>