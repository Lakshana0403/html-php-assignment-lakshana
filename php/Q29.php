29. Infer the usage of the following PHP functions:
(i) rand() (ii) abs() (iii) strreplace() (iv) pi( ) (v) ceil()

ANSWER:
<!DOCTYPE html>
<html>
<head>
    <title>PHP Function Demo</title>
</head>
<body>

<h2>PHP Built-in Function Demonstration</h2>

<?php
// 1. rand()
$random = rand(1, 100);
echo "<strong>Random number (1–100):</strong> $random<br><br>";

// 2. abs()
$negative = -45;
$absolute = abs($negative);
echo "<strong>Absolute value of -45:</strong> $absolute<br><br>";

// 3. str_replace()
$original = "Hello World";
$replaced = str_replace("World", "PHP", $original);
echo "<strong>String after replace:</strong> $replaced<br><br>";

// 4. pi()
$pi_value = pi();
echo "<strong>Value of Pi:</strong> $pi_value<br><br>";

// 5. ceil()
$number = 7.3;
$rounded = ceil($number);
echo "<strong>Ceiling of 7.3:</strong> $rounded<br><br>";
?>

</body>
</html>

OUTPUT:
PHP Built-in Function Demonstration
Random number (1–100): 33

Absolute value of -45: 45

String after replace: Hello PHP

Value of Pi: 3.1415926535898

Ceiling of 7.3: 8
