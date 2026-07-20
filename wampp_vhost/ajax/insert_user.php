<?php
require_once "../config/database.php";

$full_name = $_POST['full_name'];
$username  = $_POST['username'];
$email     = $_POST['email'];
$mobile    = $_POST['mobile'];

$sql = "INSERT INTO users (full_name, username, email, mobile)
        VALUES ('$full_name', '$username', '$email', '$mobile')";

if ($conn->query($sql)) {

    echo json_encode([
        "status" => "success",
        "message" => "User added successfully."
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => "Failed to add user."
    ]);

}
?>