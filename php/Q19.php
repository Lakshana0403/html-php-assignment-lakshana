19. Examine a PHP function that accepts an array of numbers and returns the highest and
lowest values in that array. Display the results on the webpage.

ANSWER:
<?php
$highest = $lowest = "";

function findHighLow($arr) {
    $highest = max($arr);
    $lowest = min($arr);
    return array("highest" => $highest, "lowest" => $lowest);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST["numbers"];  // Example input: 4,8,1,9,2
    $numArray = array_map('intval', explode(",", $input));

    $result = findHighLow($numArray);
    $highest = $result["highest"];
    $lowest = $result["lowest"];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Find Highest and Lowest</title>
</head>
<body>
    <h2>Enter a list of numbers separated by commas</h2>
    <form method="post">
        <input type="text" name="numbers" required>
        <input type="submit" value="Find">
    </form>

    <?php if ($highest !== ""): ?>
        <h3>Results:</h3>
<p><strong>Highest:</strong> <?php echo $highest; ?></p>
        <p><strong>Lowest:</strong> <?php echo $lowest; ?></p>
    <?php endif; ?>
</body>
</html>
OUTPUT:

Enter a list of numbers separated by commas
 5,5,8
Results:
Highest: 8

Lowest: 5
OUTPUT
