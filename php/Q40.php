40. Write a PHP script to remove all characters from a string except a-z A-Z 0-9 or " " using an array.

Program:
<?php
// Original string
$string = "Hello! Welcome to PHP 123@#.";

// Convert string to an array of characters
$chars = str_split($string);

// Filter array: keep only a-z, A-Z, 0-9, and space
$filteredChars = array_filter($chars, function($char) {
    return preg_match('/[a-zA-Z0-9 ]/', $char);
});

// Join the filtered characters back into a string
$cleanString = implode("", $filteredChars);

echo "Original String: $string<br>";
echo "Filtered String: $cleanString";
?>

Output:
Original String: Hello! Welcome to PHP 123@#.
Filtered String: Hello Welcome to PHP 123
