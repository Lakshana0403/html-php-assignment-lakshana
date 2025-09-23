47. Delete an element from the below array. And print the array elements in PHP. $x = array (1, 2, 3, 4, 5);

Program:
<?php
// Original array
$x = array(1, 2, 3, 4, 5);

echo "Original Array:\n";
print_r($x);

// Delete element (e.g., value at index 2 → number 3)
unset($x[2]);

echo "Array After Deletion:\n";
print_r($x);

// Optional: re-index the array
$x = array_values($x);

echo "Re-indexed Array:\n";
print_r($x);
?>

Output:
Original Array:
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
    [4] => 5
)

Array After Deletion:
Array
(
    [0] => 1
    [1] => 2
    [3] => 4
    [4] => 5
)

Re-indexed Array:
Array
(
    [0] => 1
    [1] => 2
    [2] => 4
    [3] => 5
)
