30. Develop a PHP script that generates a random password consisting of a combination of
letters, numbers, and special characters.

ANSWER:
<!DOCTYPE html>
<html>
<head>
    <title>Random Password Generator</title>
</head>
<body>

<h2>Random Password Generator</h2>

<?php
function generatePassword($length = 12) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+';
    $password = '';
    $maxIndex = strlen($chars) - 1;

    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[rand(0, $maxIndex)];
    }

    return $password;
}

// Generate a password
$password = generatePassword();
echo "<strong>Your Random Password:</strong> $password";
?>

</body>
</html>

OUTPUT:
Random Password Generator
Your Random Password: Tncjf=4LxqPu
