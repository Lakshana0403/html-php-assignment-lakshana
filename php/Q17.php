17. Examine the various control structures in php and construct a bank transaction problem
with customers deposit and withdrawal of amount.

ANSWER:
<?php
$balance = 1000; // Initial balance

function deposit($amount, $balance) {
    if ($amount > 0) {
        $balance += $amount;
        echo "Deposited: Rs. $amount<br>";
    } else {
        echo "Invalid deposit amount!<br>";
    }
    return $balance;
}

function withdraw($amount, $balance) {
    if ($amount > $balance) {
        echo "Insufficient balance!<br>";
    } elseif ($amount <= 0) {
        echo "Invalid withdrawal amount!<br>";
    } else {
        $balance -= $amount;
        echo "Withdrawn: Rs. $amount<br>";
    }
    return $balance;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST["action"];
    $amount = $_POST["amount"];

    switch ($action) {
        case "deposit":
            $balance = deposit($amount, $balance);
            break;
        case "withdraw":
            $balance = withdraw($amount, $balance);
            break;
        default:
            echo "Invalid action.<br>";
    }

    echo "<strong>Current Balance: Rs. $balance</strong>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bank Transaction</title>
</head>
<body>
    <h2>Simple Bank Transaction System</h2>
    <form method="post" action="">
        <label>Amount:</label>
        <input type="number" name="amount" required><br><br>

        <label>Action:</label>
        <select name="action">
            <option value="deposit">Deposit</option>
            <option value="withdraw">Withdraw</option>
        </select><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>

OUTPUT:
Insufficient balance!
Current Balance: Rs. 1000
Simple Bank Transaction System
Amount: 555
Action: Deposit
Submit
