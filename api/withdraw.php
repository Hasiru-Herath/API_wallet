<?php
require_once '../helpers.php';

$data = json_decode(file_get_contents("php://input"), true);
$userId = $data['user_id'];
$amount = $data['amount'];

if ($amount <= 0) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid withdrawal amount."]);
    exit;
}

$users = loadData('../data/users.json');

if (!isset($users[$userId]) || $users[$userId] < $amount) {
    http_response_code(400);
    echo json_encode(["error" => "Insufficient balance."]);
    exit;
}

$users[$userId] -= $amount;
saveData('../data/users.json', $users);

$transactions = loadData('../data/transactions.json');
$transactions[] = [
    "user_id" => $userId,
    "type" => "withdraw",
    "amount" => $amount,
    "timestamp" => gmdate("c")
];
saveData('../data/transactions.json', $transactions);

echo json_encode(["message" => "Withdrawal successful.", "balance" => $users[$userId]]);
