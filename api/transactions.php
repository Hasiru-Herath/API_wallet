<?php
require_once '../helpers.php';

$userId = $_GET['user_id'] ?? null;
$transactions = loadData('../data/transactions.json');

$userTransactions = array_filter($transactions, fn($tx) => $tx['user_id'] == $userId);

echo json_encode(array_values($userTransactions));
