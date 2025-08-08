22. Create a PHP script that counts the number of occurrences of a specific word in a given
string.
ANSWER:
<!DOCTYPE html>
<html>
<head>
    <title>Word Occurrence Counter</title>
</head>
<body>

<h2>Count Occurrences of a Word</h2>

<form method="post">
    Enter a string:<br>
    <textarea name="text" rows="4" cols="50" required></textarea><br><br>

    Enter word to count:<br>
    <input type="text" name="word" required><br><br>

    <input type="submit" name="submit" value="Count">
</form>

<?php
if (isset($_POST['submit'])) {
    $text = $_POST['text'];
    $word = $_POST['word'];

    // Convert both to lowercase for case-insensitive search
    $lower_text = strtolower($text);
    $lower_word = strtolower($word);

    // Count using substr_count
    $count = substr_count($lower_text, $lower_word);

    echo "<h3>Result:</h3>";
    echo "The word '<strong>$word</strong>' appears <strong>$count</strong> time(s) in the given string.";
}
?>

</body>
</html>


OUTPUT:
Count Occurrences of a Word
Enter a string:
PHP PHP PHP 

Enter word to count:
5

Result:
The word '5' appears 0 time(s) in the given string.
