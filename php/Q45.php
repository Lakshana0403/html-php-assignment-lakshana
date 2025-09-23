45. Write a PHP function to compare two multidimensional arrays and return the difference.

Program:
<?php
// Function to compare two multidimensional arrays
function array_diff_recursive($array1, $array2) {
    $result = [];

    foreach ($array1 as $key => $value) {
        // If key not present in array2
        if (!array_key_exists($key, $array2)) {
            $result[$key] = $value;
        } 
        // If value is an array, call recursively
        elseif (is_array($value) && is_array($array2[$key])) {
            $diff = array_diff_recursive($value, $array2[$key]);
            if (!empty($diff)) {
                $result[$key] = $diff;
            }
        } 
        // If values are different
        elseif ($value !== $array2[$key]) {
            $result[$key] = $value;
        }
    }

    return $result;
}

// ---- Example ----
$array1 = [
    "id" => 1,
    "name" => "Lakshana",
    "skills" => ["PHP", "Python", "Java"],
    "location" => "India"
];

$array2 = [
    "id" => 1,
    "name" => "Lakshana",
    "skills" => ["PHP", "Java"],   // missing Python
    "location" => "USA"           // different value
];

$diff = array_diff_recursive($array1, $array2);

print_r($diff);
?>


Output:

Array
(
    [skills] => Array
        (
            [1] => Python
        )

    [location] => India
)
