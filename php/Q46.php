46. Write a PHP program to find the index of a specific value in an array.

Program:
<?php
// Array of numbers
$numbers = [10, 25, 30, 45, 50, 25];

// Value to search
$searchValue = 25;

// Find index using array_search()
$index = array_search($searchValue, $numbers);

if ($index !== false) {
    echo "✅ The first occurrence of $searchValue is at index: $index\n";
} else {
    echo "❌ Value $searchValue not found in the array.\n";
}

// ---- To find all indexes of the value ----
$indexes = array_keys($numbers, $searchValue);

echo "🔎 All occurrences of $searchValue are at indexes: ";
print_r($indexes);
?>

Output:
✅ The first occurrence of 25 is at index: 1
🔎 All occurrences of 25 are at indexes: Array ( [0] => 1 [1] => 5 )
