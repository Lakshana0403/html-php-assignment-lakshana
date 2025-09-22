41. How can you use regular expressions to extract all email addresses from a given string using an array in
PHP?

Program:
<?php
// Sample string containing email addresses
$text = "Contact us at info@example.com, support@mydomain.org, or admin@test.co.in";

// Regular expression pattern for emails
$pattern = '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/';

// Use preg_match_all to find all matches
preg_match_all($pattern, $text, $matches);

// $matches[0] contains all matched email addresses
$emails = $matches[0];

// Display the emails
echo "Extracted Emails:<br>";
print_r($emails);
?>

Output:
Extracted Emails:
Array
(
    [0] => info@example.com
    [1] => support@mydomain.org
    [2] => admin@test.co.in
)
