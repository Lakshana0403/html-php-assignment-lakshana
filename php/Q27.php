27. Articulate the mathematical operators with suitable examples in PHP.

ANSWER:
<?php
// Declare two numbers
$a = 15;
$b = 4;

echo "<h2>Mathematical Operators in PHP</h2>";

echo "<b>a = $a</b><br>";
echo "<b>b = $b</b><br><br>";

// Addition
$sum = $a + $b;
echo "Addition (a + b) = $sum <br>";

// Subtraction
$diff = $a - $b;
echo "Subtraction (a - b) = $diff <br>";

// Multiplication
$prod = $a * $b;
echo "Multiplication (a * b) = $prod <br>";

// Division
$div = $a / $b;
echo "Division (a / b) = $div <br>";

// Modulus (remainder)
$mod = $a % $b;
echo "Modulus (a % b) = $mod <br>";

// Exponentiation
$power = $a ** $b;
echo "Exponentiation (a ** b) = $power <br>";
?>


OUTPUT:
Mathematical Operators in PHP
a = 15
b = 4

Addition (a + b) = 19
Subtraction (a - b) = 11
Multiplication (a * b) = 60
Division (a / b) = 3.75
Modulus (a % b) = 3
Exponentiation (a ** b) = 50625
