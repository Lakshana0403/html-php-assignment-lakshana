14. Show a form with input fields for a user's name, email, and message. When the form is
submitted, display a confirmation message on the same page with the user's name and
email.

ANSWER:
<?php
// Initialize variables
$name = $email = $message = "";
$submitted = false;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize inputs
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);
    $submitted = true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>

<h2>User Contact Form</h2>

<?php if ($submitted): ?>
    <h3>Thank you, <?php echo $name; ?>!</h3>
    <p>We have received your message and will contact you at <strong><?php echo $email; ?></strong>.</p>
<?php else: ?>
    <form method="POST" action="">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Message:</label><br>
        <textarea name="message" rows="4" cols="30" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
<?php endif; ?>

</body>
</html>

ANSWER:
User Contact Form
Thank you, !
We have received your message and will contact you at .

Name:


Email:


Message:


Submit

want to see in oss
