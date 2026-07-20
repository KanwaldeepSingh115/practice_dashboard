<?php
require_once "../config/database.php";

$user_id   = $_POST['user_id'];
$full_name = $_POST['full_name'];
$username  = $_POST['username'];
$email     = $_POST['email'];
$mobile    = $_POST['mobile'];

$sql = "UPDATE users
        SET
            full_name = '$full_name',
            username  = '$username',
            email     = '$email',
            mobile    = '$mobile'
        WHERE user_id = '$user_id'";

if ($conn->query($sql)) {

    echo json_encode([
        "status" => "success",
        "message" => "User updated successfully."
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => "Failed to update user."
    ]);

}
?>