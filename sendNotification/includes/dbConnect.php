<?php
/*
Programmer: Brittany Camarena
Date: 10/28/2020
Code Overview: Establishes connection with SQL database
*/

// Set page timezone for notification logging
date_default_timezone_set('America/Los_Angeles');

// Databse class for Microsoft SQL Server
class Database {
    const SERVER_NAME = "cisdbss.pcc.edu";
    const DATABASE = "234a_PortlandCommunityCoders";
    const USER_ID = "234a_PortlandCommunityCoders";
    const PASSWORD = "PortlandCommunityCoders_FA20_)-#";

    public static $db = NULL;

    public static function connect() {
        if (empty(Database::$db)) {
            try {  
                Database::$db = new PDO( "sqlsrv:server=" . Database::SERVER_NAME . "; database=" . Database::DATABASE, Database::USER_ID, Database::PASSWORD);
                Database::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {  
                echo "Error connecting to SQL Server<br>" . $e->getMessage();
                die();
            }
        }
    }
}
?>