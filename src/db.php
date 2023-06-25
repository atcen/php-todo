<?php
// Database configuration
$host = 'db';
$username = 'root';
$password = 'user';
$database = 'db';

// Create a new database connection
$conn = new mysqli($host, $username, $password, $database);

// Check for errors
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

// Set the character set
$conn->set_charset('utf8mb4');