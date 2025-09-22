34. Replace all occurrences of a specific word with another word in a string using regular expressions in
PHP.

Program:
<?php
// Original string
$text = "PHP is fun. Learning PHP makes web development easier. I love PHP!";

// Replace all occurrences of "PHP" with "Python"
$updatedText = preg_replace("/PHP/", "Python", $text);

echo "Original Text: $text <br>";
echo "Updated Text: $updatedText";
?>

Output:
Original Text: PHP is fun. Learning PHP makes web development easier. I love PHP!
Updated Text: Python is fun. Learning Python makes web development easier. I love Python!
