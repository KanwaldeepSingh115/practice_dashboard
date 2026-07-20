<?php
require_once "../config/database.php";

$user_id = $_POST['user_id'];

$result = $conn->query("DELETE FROM users WHERE user_id='$user_id'");

if($result){

    echo json_encode([
        "status"=>"success",
        "message"=>"User deleted successfully."
    ]);

}else{

    echo json_encode([
        "status"=>"error",
        "message"=>"Delete failed."
    ]);

}