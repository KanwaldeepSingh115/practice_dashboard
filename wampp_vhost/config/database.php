<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "test_new";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");