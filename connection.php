<?php
//make mysql connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'school_db';
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Set the character set to UTF-8
mysqli_set_charset($conn, 'utf8');