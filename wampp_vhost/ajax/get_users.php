<?php
require_once "../config/database.php";

$search = isset($_GET['search']) ? $_GET['search'] : '';
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

$where = "";


if ($search != '') {

    $search = $conn->real_escape_string($search);
    $where = "WHERE full_name LIKE '%$search%' OR email LIKE '%$search%'";

}

$totalResult = $conn->query("SELECT COUNT(*) AS total FROM users $where");
$totalRows = $totalResult->fetch_assoc()['total'];
$totalPages = ceil($totalRows / $limit);

$result = $conn->query("SELECT * FROM users $where ORDER BY user_id DESC LIMIT $limit OFFSET $offset");

$users = [];

while ($row = $result->fetch_assoc()) {
    $users[] = $row;

}

echo json_encode([
    "users" => $users,
    "totalPages" => $totalPages,
    "currentPage" => $page
]);

?>