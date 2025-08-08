25. Construct a PHP script to replace the first ‘the’ of the following string with ‘best’. Data:
“The Thing will come to you soon”

ANSWER:
<!DOCTYPE html>
<html>
<head>
    <title>Replace First Occurrence</title>
</head>
<body>

<h2>Replace First 'the' with 'best'</h2>

<?php
$text = "The Thing will come to you soon";

// Replace first occurrence of 'the' (case-insensitive)
$replaced = preg_replace('/\bthe\b/i', 'best', $text, 1);

echo "<strong>Original:</strong> $text<br>";
echo "<strong>Modified:</strong> $replaced";
?>

</body>
</html>

OUTPUT:
Original: The Thing will come to you soon  
Modified: best Thing will come to you soon
