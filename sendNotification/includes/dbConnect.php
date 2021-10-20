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
    const SERVER_NAME = "sql109.epizy.com";
    const DATABASE = "epiz_30097581_cis234a";
    const USER_ID = "epiz_30097581";
    const PASSWORD = "SLIcfVmkbV";

    /*
	const SERVER_NAME = "localhost";
    const DATABASE = "cis234a";
    const USER_ID = "root";
    const PASSWORD = "";
	*/

    public static $db = NULL;

    public static function connect() {
        if (empty(Database::$db)) {
            try {  
                Database::$db = new PDO( "mysql:host=" . Database::SERVER_NAME . "; dbname=" . Database::DATABASE, Database::USER_ID, Database::PASSWORD);
                Database::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {  
                echo "Error connecting to SQL Server<br>" . $e->getMessage();
                die();
            }
        }
    }

    // Verify login credentials
    public static function verifyLogin($username, $password) {
        Database::connect();
        $find_password = 'SELECT password FROM users WHERE username = :username';
        $smt = Database::$db->prepare($find_password);
        $smt->bindValue(':username', $username);
        $smt->execute();
        $rows = $smt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $row) {
            if (password_verify($password, $row['password'])) {
                return true;
            } else {
                return false;
            }
        }
    }

    // Fetch user information from database
    public static function get_userInfo($username) {
        Database::connect();
        $sql = 'SELECT userID, username, name, role FROM users WHERE username = :username';
        $smt = Database::$db->prepare($sql);
        $smt->bindValue(':username', $username);
        $smt->execute();
        $rows = $smt->fetchAll(PDO::FETCH_ASSOC);
    
        return $rows;
    }
}
?>