33. Construct a PHP code to create a multidimensional array representing a matrix and display the value in
the second row and third column.

Program:
<?php
// Create a 3x3 matrix (multidimensional array)
$matrix = array(
    array(1, 2, 3),
    array(4, 5, 6),
    array(7, 8, 9)
);

// Access value in 2nd row (index 1) and 3rd column (index 2)
$value = $matrix[1][2];

echo "The value in the second row and third column is: $value";
?>

Output:
The value in the second row and third column is: 6
