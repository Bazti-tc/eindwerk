<?php
$servername = "localhost";
$username = "root";
$password = "usbw";
$db = "webshop";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

echo "Connection successfully";
?>