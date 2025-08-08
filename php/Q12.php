12.Write a program to check student grade based on marks:
Conditions:
If marks are 75% or more, the grade will be First Class.
If marks between 60% to 74%, grade will be second class.
If marks between 40% to 59%, grade will be third class.
If marks are less than 40%, students will be Fail.

ANSWER:
<?php
// Example marks (you can change this value to test different cases)
$marks = 68;

if ($marks >= 75) {
    echo "Grade: First Class";
} elseif ($marks >= 60 && $marks <= 74) {
    echo "Grade: Second Class";
} elseif ($marks >= 40 && $marks <= 59) {
    echo "Grade: Third Class";
} elseif ($marks >= 0 && $marks < 40) {
    echo "Grade: Fail";
} else {
    echo "Invalid Marks Entered!";
}
?>

OUTPUT:
Sample Input
95
Your Output
Grade: Second Class
