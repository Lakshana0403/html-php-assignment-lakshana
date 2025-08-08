16. Write a PHP function that takes two numbers as input and returns the sum of those
numbers. Display the result on the webpage, when a button is clicked.

ANSWERp:
<?php
function addNumbers($a, $b) {
    return $a + $b;
}

$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $result = addNumbers($num1, $num2);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sum of Two Numbers</title>
</head>
<body>
    <h2>Sum Calculator</h2>
    <form method="POST" action="">
        <label>Enter first number:</label><br>
        <input type="number" name="num1" required><br><br>

        <label>Enter second number:</label><br>
        <input type="number" name="num2" required><br><br>

        <input type="submit" value="Add Numbers">
    </form>

    <?php
    if ($result !== "") {
        echo "<h3>Result: $result</h3>";
    }
    ?>
</body>
</html>

OUTPUT:
Sum Calculator
Enter first number:

5
Enter second number:
8

Result: 13
