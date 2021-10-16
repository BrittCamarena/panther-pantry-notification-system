<!--
Programmer: Brittany Camarena
Date: 10/28/2020
Code Overview: Provides the HTML GUI for the send notification page
-->

<?php
// Check if user is logged in and is a manager
require_once("masterIncludes/sessionCheck.php");
require_once("masterIncludes/permissionCheck.php");
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='author' content='Lief J Cain & Brittany Camarena'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='sendNotification/css/styles.css'>
    <script src='sendNotification/scripts/scripts.js'></script>
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
            <h2 id='cardTitle'>Send Notification</h2>
        </div>
        <div class='card-body'>
            <br/>
            <form id='notificationForm'>
                <div class='form-group'>
                    <select class='form-control' id='selectTemplate' name='selectTemplate'>
                        <option selected disabled hidden>-- Select Template --</option>
                        <option>-- Reset Form --</option>
                        <option>-- No Template --</option>
                    </select>
                </div>
                <div class='form-group'>
                    <input type='text' class='form-control' id='subjectField' placeholder='Subject' name='subjectField'>
                </div>
                <div class='form-group'>
                    <textarea class="form-control" id='messageField' placeholder='Message Text' name='messageField'></textarea>
                </div>
                <div id='buttonDiv'>
                    <button type='submit' id='submit' class='btn btn-primary Button'>Send</button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Modal alert -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
        </div>
    </div>
</div>

</body>
</html>