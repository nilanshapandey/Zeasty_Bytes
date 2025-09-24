<?php
// db.php
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = ''; // default WAMP
$DB_NAME = 'zesty_db';

$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($conn->connect_error) {
    die('DB Connection Error: ' . $conn->connect_error);
}
$conn->set_charset('utf8mb4');
