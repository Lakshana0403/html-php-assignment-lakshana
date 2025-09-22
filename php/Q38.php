38. Interpret the steps to iterate over a PHP array using a while loop with an example

PROGRAM:
<?php
$fruits = array("Apple", "Banana", "Mango", "Orange");

// Step 2: Initialize counter
$i = 0;

// Step 3: Loop while counter is less than array length
while ($i < count($fruits)) {
    // Step 4: Access current element
    echo "Fruit at index $i: " . $fruits[$i] . "<br>";
    
    // Step 5: Increment counter
    $i++;
}
?>

OUTPUT:
Fruit at index 0: Apple
Fruit at index 1: Banana
Fruit at index 2: Mango
Fruit at index 3: Orange
