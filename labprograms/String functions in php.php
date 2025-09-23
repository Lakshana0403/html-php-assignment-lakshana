<?php
// Initialize variables
$text = "";
$results = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $_POST['text'] ?? "";

    if (!empty($text)) {
        // Count words
        $results['word_count'] = str_word_count($text);

        // Count characters (including spaces)
        $results['char_count'] = strlen($text);

        // Convert to uppercase
        $results['uppercase'] = strtoupper($text);

        // Convert to lowercase
        $results['lowercase'] = strtolower($text);

        // Reverse text
        $results['reverse'] = strrev($text);

        // Check for a specific word
        $searchWord = $_POST['search_word'] ?? "";
        if (!empty($searchWord)) {
            if (stripos($text, $searchWord) !== false) {
                $results['search'] = "The word '{$searchWord}' exists in the text.";
            } else {
                $results['search'] = "The word '{$searchWord}' does NOT exist in the text.";
            }
        }

        // Replace word
        $replaceWord = $_POST['replace_word'] ?? "";
        $replaceWith = $_POST['replace_with'] ?? "";
        if (!empty($replaceWord) && !empty($replaceWith)) {
            $results['replace'] = str_ireplace($replaceWord, $replaceWith, $text);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PHP Text Analyzer</title>
<style>
body { font-family: Arial, sans-serif; background:#f0f0f0; color:#333; padding:20px; }
h1 { text-align:center; color:#444; }
form { max-width:600px; margin:auto; background:#fff; padding:20px; border-radius:10px; box-shadow:0 5px 15px rgba(0,0,0,0.1); }
textarea { width:100%; height:100px; padding:10px; margin-bottom:10px; border-radius:5px; border:1px solid #ccc; }
input[type="text"] { width:100%; padding:8px; margin-bottom:10px; border-radius:5px; border:1px solid #ccc; }
button { padding:10px 20px; background:#444; color:white; border:none; border-radius:5px; cursor:pointer; }
button:hover { background:#666; }
.results { max-width:600px; margin:20px auto; background:#fff; padding:20px; border-radius:10px; box-shadow:0 5px 15px rgba(0,0,0,0.1); }
.results p { margin:10px 0; }
</style>
</head>
<body>

<h1>PHP Text Analyzer</h1>

<form method="POST">
    <label>Enter your text:</label>
    <textarea name="text"><?= htmlspecialchars($text) ?></textarea>

    <label>Word to search:</label>
    <input type="text" name="search_word" value="<?= htmlspecialchars($_POST['search_word'] ?? "") ?>">

    <label>Word to replace:</label>
    <input type="text" name="replace_word" placeholder="Word to replace" value="<?= htmlspecialchars($_POST['replace_word'] ?? "") ?>">
    <input type="text" name="replace_with" placeholder="Replace with" value="<?= htmlspecialchars($_POST['replace_with'] ?? "") ?>">

    <button type="submit">Analyze Text</button>
</form>

<?php if (!empty($results)): ?>
<div class="results">
    <h2>Analysis Results:</h2>
    <p><strong>Word Count:</strong> <?= $results['word_count'] ?? 0 ?></p>
    <p><strong>Character Count:</strong> <?= $results['char_count'] ?? 0 ?></p>
    <p><strong>Uppercase:</strong> <?= $results['uppercase'] ?? "" ?></p>
    <p><strong>Lowercase:</strong> <?= $results['lowercase'] ?? "" ?></p>
    <p><strong>Reversed Text:</strong> <?= $results['reverse'] ?? "" ?></p>
    <?php if (isset($results['search'])): ?>
        <p><strong>Search Result:</strong> <?= $results['search'] ?></p>
    <?php endif; ?>
    <?php if (isset($results['replace'])): ?>
        <p><strong>Replaced Text:</strong> <?= $results['replace'] ?></p>
    <?php endif; ?>
</div>
<?php endif; ?>

</body>
</html>
