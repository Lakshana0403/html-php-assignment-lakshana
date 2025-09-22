Remove the first element from an array in PHP using array functions.

<?php
$fruits = ["Apple", "Banana", "Cherry", "Mango"];

// Remove first element
$removed = array_shift($fruits);

echo "Removed element: " . $removed . "\n";
print_r($fruits);
?>

Outout:
Removed element: Apple Array ( [0] => Banana [1] => Cherry [2] => Mango )
