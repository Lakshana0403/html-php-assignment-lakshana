13. Consider the following snippet, comment your views.
$sub = substr(12345, 2, 2);
echo “sub is $sub”;

ANSWER:
<?php
// Extracting part of a number using substr (number will be treated as string)
$sub = substr(12345, 2, 2); // Starting from index 2, extract 2 characters

// Display the result
echo "sub is $sub"; // Output: sub is 34
?>

OUTPUT:
Your Output
sub is 34
