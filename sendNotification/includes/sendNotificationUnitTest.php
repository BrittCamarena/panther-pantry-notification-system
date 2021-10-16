<?php
/*
Programmer: Brittany Camarena
Date: 11/11/2020
Code Overview: PHPUnit tests for various actions used by the Send Notification story
*/
use PHPUnit\Framework\TestCase;

// Database connection for Microsoft SQL Server
require_once("dbConnect.php");

class sendNotificationUnitTest extends TestCase {
    public function testGetRecipients() {
        Database::connect();

        $sql = "SELECT email FROM users WHERE role = 'Subscriber'";
        $stmt = Database::$db->query($sql);
        $rows = $stmt->fetchAll();
    
        $this->assertNotEmpty($rows);
    }

    public function testNotificationAccess() {
        Database::connect();

        $sql = "SELECT TOP 10 * FROM notifications";
        $stmt = Database::$db->query($sql);
        $rows = $stmt->fetchAll();

        $this->assertNotEmpty($rows);
    }

    public function testEmptyPost() {
        $_POST["subject"] = "";
        $_POST["message"] = "";
        
        $this->assertEmpty($_POST["subject"]);
        $this->assertEmpty($_POST["message"]);
    }

    public function testSpacesPost() {
        $_POST["subject"] = "   ";
        $_POST["message"] = "   ";
        
        $this->assertEmpty(trim($_POST["subject"]));
        $this->assertEmpty(trim($_POST["message"]));
    }

    public function testSendEmail() {
        $mailFrom = 'foodpantry-noreply@pcc.edu';
        $headers = "From: " . $mailFrom;
        $recipient = "testuser@mailinator.com";
        $mail = mail($recipient, "Test Subject", "Test Message", $headers);

        $this->assertTrue($mail);
    }
}
?>