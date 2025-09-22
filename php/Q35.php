35. Write a PHP script using an array that checks if a string contains another string and displays the result.
Program:
<?php
// Main string to check inside
$mainString = "Welcome to PHP programming";

// Array of substrings to check
$subStrings = array("PHP", "Java", "programming", "Python");

// Loop through each substring
foreach ($subStrings as $word) {
    if (strpos($mainString, $word) !== false) {
        echo "The string contains: $word <br>";
    } else {
        echo "The string does not contain: $word <br>";
    }
}
?>

Output:
