<?php
require_once "../config/database.php";

$user_id = $_GET['user_id'];

$result = $conn->query("SELECT * FROM users WHERE user_id = '$user_id'");

$user = $result->fetch_assoc();

echo json_encode($user);
?>