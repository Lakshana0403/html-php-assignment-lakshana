<?php
$name = $email = $subject = $message = "";
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate name
    $name = trim($_POST['name']);
    if (empty($name)) $errors['name'] = "Name is required.";

    // Sanitize and validate email
    $email = trim($_POST['email']);
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    // Sanitize subject
    $subject = trim($_POST['subject']);
    if (empty($subject)) $errors['subject'] = "Subject is required.";

    // Sanitize message
    $message = trim($_POST['message']);
    if (empty($message)) $errors['message'] = "Message is required.";

    // If no errors, set success
    if (empty($errors)) $success = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us - PHP Form Handling</title>
<style>
/* General Styling */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #f9f4ef, #f0e6d2);
    color: #333;
    margin: 0;
    padding: 0;
}
h1 {
    text-align: center;
    margin-top: 40px;
    color: #6b4f3b;
}

/* Form Styling */
form {
    max-width: 600px;
    margin: 40px auto;
    background: #fff5e6;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}
label {
    display: block;
    margin: 15px 0 5px;
    font-weight: 600;
}
input[type="text"],
input[type="email"],
textarea {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    border: 1px solid #d1bfa7;
    box-sizing: border-box;
    font-size: 1rem;
    transition: border 0.3s;
}
input[type="text"]:focus,
input[type="email"]:focus,
textarea:focus {
    border: 2px solid #a77a5f;
    outline: none;
}
textarea {
    height: 120px;
    resize: vertical;
}
button {
    background: #6b4f3b;
    color: white;
    padding: 12px 25px;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    font-size: 1rem;
    margin-top: 20px;
    transition: background 0.3s, transform 0.2s;
}
button:hover {
    background: #8c654c;
    transform: translateY(-2px);
}

/* Error messages */
.error {
    color: #d9534f;
    font-size: 0.9rem;
    margin-top: 3px;
}

/* Success message */
.success {
    max-width: 600px;
    margin: 30px auto;
    background: #dff0d8;
    padding: 20px;
    border-radius: 15px;
    color: #3c763d;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}
.success h2 {
    margin-top: 0;
}
</style>
</head>
<body>

<h1>Contact Us</h1>

<?php if ($success): ?>
<div class="success">
    <h2>Thank You, <?= htmlspecialchars($name) ?>!</h2>
    <p>We have received your message.</p>
    <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
    <p><strong>Subject:</strong> <?= htmlspecialchars($subject) ?></p>
    <p><strong>Message:</strong> <?= nl2br(htmlspecialchars($message)) ?></p>
</div>
<?php else: ?>
<form method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="<?= htmlspecialchars($name) ?>">
    <?php if(isset($errors['name'])): ?><div class="error"><?= $errors['name'] ?></div><?php endif; ?>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?= htmlspecialchars($email) ?>">
    <?php if(isset($errors['email'])): ?><div class="error"><?= $errors['email'] ?></div><?php endif; ?>

    <label for="subject">Subject:</label>
    <input type="text" name="subject" id="subject" value="<?= htmlspecialchars($subject) ?>">
    <?php if(isset($errors['subject'])): ?><div class="error"><?= $errors['subject'] ?></div><?php endif; ?>

    <label for="message">Message:</label>
    <textarea name="message" id="message"><?= htmlspecialchars($message) ?></textarea>
    <?php if(isset($errors['message'])): ?><div class="error"><?= $errors['message'] ?></div><?php endif; ?>

    <button type="submit">Send Message</button>
</form>
<?php endif; ?>

</body>
</html>
