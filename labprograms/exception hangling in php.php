<?php
$balance = 0;
$withdraw = 0;
$deposit = 0;
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Validate initial balance
        if (!isset($_POST['balance']) || !is_numeric($_POST['balance']) || $_POST['balance'] < 0) {
            throw new Exception("Initial balance must be a positive number.");
        }
        $balance = floatval($_POST['balance']);

        // Validate deposit
        $deposit = floatval($_POST['deposit'] ?? 0);
        if ($deposit < 0) {
            throw new Exception("Deposit amount cannot be negative.");
        }

        // Validate withdrawal
        $withdraw = floatval($_POST['withdraw'] ?? 0);
        if ($withdraw < 0) {
            throw new Exception("Withdrawal amount cannot be negative.");
        }

        // Check sufficient balance
        if ($withdraw > $balance + $deposit) {
            throw new Exception("Insufficient balance for this withdrawal.");
        }

        // Perform transaction
        $balance = $balance + $deposit - $withdraw;
        $success = true;

    } catch (Exception $e) {
        $errors[] = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Simple Bank Transaction</title>
<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f4ece2;
    color: #3e2c23;
    padding: 20px;
}
h1 { text-align: center; color: #6f4e37; margin-bottom: 20px; }
form {
    max-width: 500px;
    margin: 0 auto;
    background: #fff5e6;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}
label { display: block; margin-top: 15px; font-weight: 600; }
input[type="number"] {
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    border: 1px solid #d2b48c;
    margin-top: 5px;
}
button {
    margin-top: 20px;
    padding: 12px 25px;
    background: #6f4e37;
    color: white;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    transition: background 0.3s, transform 0.2s;
}
button:hover { background: #8b5e3c; transform: translateY(-2px); }
.errors {
    max-width: 500px;
    margin: 20px auto;
    background: #f8d7da;
    color: #721c24;
    padding: 15px;
    border-radius: 10px;
}
.success {
    max-width: 500px;
    margin: 20px auto;
    background: #d4edda;
    color: #155724;
    padding: 15px;
    border-radius: 10px;
}
</style>
</head>
<body>

<h1>Bank Transaction System</h1>

<?php if (!empty($errors)): ?>
    <div class="errors">
        <?php foreach($errors as $error) echo "<p>$error</p>"; ?>
    </div>
<?php endif; ?>

<?php if ($success): ?>
    <div class="success">
        <h2>Transaction Successful!</h2>
        <p><strong>Deposit:</strong> $<?= number_format($deposit, 2) ?></p>
        <p><strong>Withdrawal:</strong> $<?= number_format($withdraw, 2) ?></p>
        <p><strong>Updated Balance:</strong> $<?= number_format($balance, 2) ?></p>
    </div>
<?php endif; ?>

<form method="POST">
    <label for="balance">Current Balance:</label>
    <input type="number" step="0.01" name="balance" id="balance" value="<?= htmlspecialchars($balance) ?>" required>

    <label for="deposit">Deposit Amount:</label>
    <input type="number" step="0.01" name="deposit" id="deposit" value="<?= htmlspecialchars($deposit) ?>">

    <label for="withdraw">Withdrawal Amount:</label>
    <input type="number" step="0.01" name="withdraw" id="withdraw" value="<?= htmlspecialchars($withdraw) ?>">

    <button type="submit">Submit Transaction</button>
</form>

</body>
</html>
