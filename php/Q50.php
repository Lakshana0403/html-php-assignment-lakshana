50. Lower-case and Upper-case Array Elements
<?php
$colors = ["Red", "Green", "Blue"];

// Lower-case
$lower = array_map("strtolower", $colors);

// Upper-case
$upper = array_map("strtoupper", $colors);

print_r($lower);
print_r($upper);
?>

Output:
Array ( [0] => red [1] => green [2] => blue ) Array ( [0] => RED [1] => GREEN [2] => BLUE )
