43. Develop a regular expression pattern that validates a password based on the following criteria: at least 8
characters long, contains at least one uppercase letter, one lowercase letter, one digit, and one special
character.

Program:
<?php
// Function to validate password
function validatePassword($password) {
    // Regex pattern
    $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&^#()[\]{}<>])[A-Za-z\d@$!%*?&^#()[\]{}<>]{8,}$/";

    if (preg_match($pattern, $password)) {
        return "✅ Valid password: $password";
    } else {
        return "❌ Invalid password: $password";
    }
}

// Test cases
$passwords = ["Pass@123", "password", "PASS1234", "P@ss1", "Strong#2025"];

foreach ($passwords as $pwd) {
    echo validatePassword($pwd) . "\n";
}
?>

Output:
✅ Valid password: Pass@123
❌ Invalid password: password
❌ Invalid password: PASS1234
❌ Invalid password: P@ss1
✅ Valid password: Strong#2025
