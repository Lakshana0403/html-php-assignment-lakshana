28. Consider three variables $a, $b, $c, apply var_dump() function to evaluate if the values
are equal or not.

ANSWER:
<?php
// Declare three variables
$a = 100;
$b = "100";  // string
$c = 100.0;  // float

echo "<h3>Using var_dump() to compare values</h3>";

echo "Value of \$a: ";
var_dump($a);

echo "<br>Value of \$b: ";
var_dump($b);

echo "<br>Value of \$c: ";
var_dump($c);

echo "<hr>";

// Check if values are equal (==) — value comparison
echo "Comparison using == (equal):<br>";
echo "\$a == \$b: ";
var_dump($a == $b);  // true

echo "\$a == \$c: ";
var_dump($a == $c);  // true

echo "\$b == \$c: ";
var_dump($b == $c);  // true

echo "<hr>";

// Check if values and types are equal (===) — strict comparison
echo "Comparison using === (identical):<br>";
echo "\$a === \$b: ";
var_dump($a === $b);  // false

echo "\$a === \$c: ";
var_dump($a === $c);  // false

echo "\$b === \$c: ";
var_dump($b === $c);  // false
?>

OUTPUT:
Using var_dump() to compare values
Value of $a: int(100)
Value of $b: string(3) "100"
Value of $c: float(100)
Comparison using == (equal):
$a == $b: bool(true) $a == $c: bool(true) $b == $c: bool(true)
Comparison using === (identical):
$a === $b: bool(false) $a === $c: bool(false) $b === $c: bool(false)
