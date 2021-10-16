<!--
Programmer: Brittany Camarena
Date: 11/11/2020
Code Overview: Main GUI portal for accessing each team member's story
-->

<?php
// Check if user is logged in
require_once("masterIncludes/sessionCheck.php");
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
    <title>Food Pantry - Welcome</title>
</head>

<body>

<!-- PHP included navigation bar-->
<?php include_once("masterIncludes/navigation.php"); ?>

<div id="portalContainer" class='container'>
    <div id="textContainer">
        <h1 id="portalHeader">Hello, <?php echo $_SESSION['name']; ?>!</h1>
        <p id="portalPara">Access our Food Pantry <?php echo $_SESSION['role']; ?> services by using the navigation above.</p>
    </div>
</div>

</body>
</html>