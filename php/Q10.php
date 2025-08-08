10. Develop a program to check student grades based on marks using a loop.

ANSWER:
<?php

// your code goes here

// Example: Student mark
$marks = 85;

// Checking grade
if ($marks >= 90 && $marks <= 100) {
    echo "Grade: A+";
} elseif ($marks >= 80) {
    echo "Grade: A";
} elseif ($marks >= 70) {
    echo "Grade: B";
} elseif ($marks >= 60) {
    echo "Grade: C";
} elseif ($marks >= 50) {
    echo "Grade: D";
} elseif ($marks >= 0) {
    echo "Grade: F";
} else {
    echo "Invalid marks";
}
?>

OUTPUT:
Sample Input
85
Your Output
Grade: A
