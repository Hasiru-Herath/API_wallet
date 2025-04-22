# 💸 Mini Wallet API (Pure PHP)

A simple RESTful wallet system built using **pure PHP (no frameworks)**.  
Users can deposit, withdraw, check balance, and (optionally) view transaction history.

---

## 📦 Features

- `POST /deposit` – Deposit amount to a user's wallet.
- `POST /withdraw` – Withdraw amount from a user's wallet.
- `GET /balance?user_id=` – Get current balance of the user.
- `GET /transactions?user_id=` – View transaction history .

---

## 🧰 Tech Stack

- PHP (built-in server)
- File-based storage (JSON files)

---

## 🛠️ Setup Instructions

1. **Clone this repository:**

```bash
git clone https://github.com/Hasiru-Herath/API_wallet
cd mini-wallet-api
