21. Construct a PHP function that checks if a given year is a leap year and returns true or
false accordingly.

ANSWER:
<?php
$name = $email = $message = "";
$nameErr = $emailErr = $messageErr = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = htmlspecialchars($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = htmlspecialchars($_POST["email"]);
    }

    if (empty($_POST["message"])) {
        $messageErr = "Message is required";
    } else {
        $message = htmlspecialchars($_POST["message"]);
    }

    if ($name && $email && $message) {
        $success = "Thank you, <strong>$name</strong>. We have received your message.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>
    <h2>Contact Us</h2>
    <form method="post">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?php echo $name; ?>"><br>
        <span style="color:red"><?php echo $nameErr; ?></span><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo $email; ?>"><br>
        <span style="color:red"><?php echo $emailErr; ?></span><br><br>

        <label>Message:</label><br>
        <textarea name="message"><?php echo $message; ?></textarea><br>
        <span style="color:red"><?php echo $messageErr; ?></span><br><br>

        <input type="submit" value="Submit">
    </form>

    <?php if ($success): ?>
        <h3 style="color:green"><?php echo $success; ?></h3>
    <?php endif; ?>
</body>
</html>

OUTPUT:
Contact Us
Name:
Lakshana S
Email:
23bcs052@psgrkcw.ac.in
Message:
sufuybfe7gfey7fwf
Thank you, Lakshana S. We have received your message. 
