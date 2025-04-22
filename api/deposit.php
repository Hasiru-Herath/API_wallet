<?php
require_once '../helpers.php';

$data = json_decode(file_get_contents("php://input"), true);
$userId = $data['user_id'];
$amount = $data['amount'];

if ($amount <= 0) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid deposit amount."]);
    exit;
}

$users = loadData('../data/users.json');
$users[$userId] = ($users[$userId] ?? 0) + $amount;
saveData('../data/users.json', $users);

$transactions = loadData('../data/transactions.json');
$transactions[] = [
    "user_id" => $userId,
    "type" => "deposit",
    "amount" => $amount,
    "timestamp" => gmdate("c")
];
saveData('../data/transactions.json', $transactions);

echo json_encode(["message" => "Deposit successful.", "balance" => $users[$userId]]);
