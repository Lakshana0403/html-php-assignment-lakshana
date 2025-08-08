11. Develop a PHP program to show days of the week using switch cases.

ANSWER:
<?php
// Example: Enter number from 1 to 7
$day_number = 3;

switch ($day_number) {
    case 1:
        echo "Sunday";
        break;
    case 2:
        echo "Monday";
        break;
    case 3:
        echo "Tuesday";
        break;
    case 4:
        echo "Wednesday";
        break;
    case 5:
        echo "Thursday";
        break;
    case 6:
        echo "Friday";
        break;
    case 7:
        echo "Saturday";
        break;
    default:
        echo "Invalid day number. Please enter a number between 1 and 7.";
}
?>

OUTPUT:
Sample Input
3
Your Output
Tuesday
