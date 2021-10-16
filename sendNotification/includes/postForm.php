<?php
/*
Programmer: Brittany Camarena
Date: 10/28/2020
Code Overview: Sends notification to food pantry subscribers and saves form data to database
*/
session_start();

// Database connection for Microsoft SQL Server
require_once("dbConnect.php");

// POST data constants
define("USER_ID", $_SESSION["userID"]);
define("TEMPLATE", $_POST["template"]);
define("SUBJECT", $_POST["subject"]);
define("MESSAGE", $_POST["message"]);

validateFields();
sendNotification();
saveNotification();

// Function for validating form data (server-side)
function validateFields() {    
    if (empty(SUBJECT) || trim(SUBJECT) == "" || empty(MESSAGE) || trim(MESSAGE) == "") {
        echo "Error: Fields are blank, missing, or contain only whitespace. Exiting...";
        exit;
    }
}

// Function that fetches the matching template ID from the database
function getTemplateID() {
    Database::connect();

    $sql = "SELECT templateID FROM templates WHERE name = :template";
    $stmt = Database::$db->prepare($sql);
    
    $stmt->bindValue(':template', TEMPLATE);
    $stmt->execute();
    $row = $stmt->fetch();

    if (!empty($row)) {
        $templateID = $row['templateID'];
    } else {
        $templateID = NULL;
    }
    return $templateID;
}

// Function that fetches subscriber emails in the database
function getRecipients() {
    Database::connect();

    $sql = "SELECT email FROM users WHERE role = 'Subscriber'";
    $stmt = Database::$db->query($sql);
    $rows = $stmt->fetchAll();

    if (!empty($rows)) {
        foreach ($rows as $row) {
            $recipients[] = $row['email'];
        }
    } else {
        $recipients = [];
    }
    return $recipients;
}

// Function that sends notification to subscribers
function sendNotification() {
    $mailFrom = 'foodpantry-noreply@pcc.edu';
    $headers = "From: " . $mailFrom;
    $recipients = getRecipients();
    
    if (count($recipients) > 0) {
        foreach ($recipients as $r) {
            mail($r, SUBJECT, MESSAGE, $headers);
            // DEBUG CODE
            // echo $r . " " . SUBJECT . " " . MESSAGE . "<br>";
        }
        echo "Notification sent successfully<br>";
    } else {
        echo "Warning: No recipients in database<br>";
    }
}

// Function that saves notification to the database
function saveNotification() {   
    Database::connect();

    $templateID = getTemplateID();
    $date = date("Y-m-d H:i:s");
    $recipientCount = count(getRecipients());    
    $sql = "INSERT INTO notifications (FK_userID, FK_templateID, date, subject, messageText, recipients) VALUES (:userID, :templateID, :date, :subject, :message, :recipientCount)";
    $stmt = Database::$db->prepare($sql);

    $stmt->bindValue(':userID', USER_ID);
    $stmt->bindValue(':templateID', $templateID);
    $stmt->bindValue(':date', $date);
    $stmt->bindValue(':subject', SUBJECT);
    $stmt->bindValue(':message', MESSAGE);
    $stmt->bindValue(':recipientCount', $recipientCount);

    $insert = $stmt->execute();
    // DEBUG CODE
    // $insert = true;

    if ($insert) {
        echo "Notification saved successfully<br>";
        // DEBUG CODE
        // echo "UserID: " . USER_ID . " " . "TemplateID: " . $templateID . " " . SUBJECT . " " . MESSAGE . " " . $recipientCount . " " . "<br>";
    } else {
        echo "Error saving notification. Make sure SQL statement is correct and datatypes match the inserted values.<br>";
    }
}
?>