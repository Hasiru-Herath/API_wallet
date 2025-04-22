<?php
require_once '../helpers.php';

$userId = $_GET['user_id'] ?? null;

$users = loadData('../data/users.json');
$balance = $users[$userId] ?? 0;

echo json_encode(["user_id" => $userId, "balance" => $balance]);
