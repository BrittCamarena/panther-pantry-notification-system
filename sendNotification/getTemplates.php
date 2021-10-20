<?php
/*
Programmer: Brittany Camarena
Date: 11/12/2020
Code Overview: Gets notification templates from database
*/

// Database connection for Microsoft SQL Server
require_once("includes/dbConnect.php");

getTemplates();

// Function that fetches templates from the database
function getTemplates() {
    Database::connect();

    $sql = "SELECT name, subject, templateText FROM templates";
    $stmt = Database::$db->query($sql);
    $rows = $stmt->fetchAll();

    echo json_encode($rows);
}
?>