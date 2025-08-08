15. Create a PHP program to compute the sum of the digits of a number.

ANSWER:
<?php
$number = "";
$sum = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST["number"];
    $temp = $number;
    while ($temp > 0) {
        $digit = $temp % 10;
        $sum += $digit;
        $temp = floor($temp / 10);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sum of Digits</title>
</head>
<body>
    <h2>Sum of Digits Calculator</h2>

    <form method="POST" action="">
        <label>Enter a number:</label><br>
        <input type="number" name="number" required><br><br>
        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h3>Sum of digits of $number is: $sum</h3>";
    }
    ?>
</body>
</html>

OUTPUT:
Sum of Digits Calculator
Enter a number:

HAVING a box to enter a value
Sum of digits of 5 is: 5
