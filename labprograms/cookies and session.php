<?php
session_start();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $color = trim($_POST['color']);

    if (!empty($name) && !empty($color)) {
        // Set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['name'] = $name;
        $_SESSION['color'] = $color;

        // Set cookies for 30 days
        setcookie('name', $name, time() + (30*24*60*60));
        setcookie('color', $color, time() + (30*24*60*60));

        header("Location: welcome_user.php");
        exit();
    } else {
        $error = "Please enter your name and favorite color.";
    }
}

// Check if user is already logged in via session or cookies
if (isset($_SESSION['loggedin'])) {
    $name = $_SESSION['name'];
    $color = $_SESSION['color'];
} elseif (isset($_COOKIE['name']) && isset($_COOKIE['color'])) {
    $name = $_COOKIE['name'];
    $color = $_COOKIE['color'];
    $_SESSION['loggedin'] = true;
    $_SESSION['name'] = $name;
    $_SESSION['color'] = $color;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Personalized Welcome</title>
<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #f4ece2;
}
.container {
    background: #fff5e6;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    text-align: center;
}
h1 { color: #6b4f3b; }
form input[type="text"] {
    padding: 10px;
    margin: 10px 0;
    width: 80%;
    border-radius: 10px;
    border: 1px solid #d1bfa7;
}
form button {
    padding: 12px 25px;
    margin-top: 10px;
    background: #6b4f3b;
    color: white;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    transition: 0.3s;
}
form button:hover { background: #8c654c; transform: translateY(-2px); }
.error { color: #d9534f; margin-bottom: 10px; }
</style>
</head>
<body>

<div class="container" style="border: 5px solid <?= isset($color) ? htmlspecialchars($color) : '#6b4f3b' ?>;">
    <?php if(isset($name) && isset($color)): ?>
        <h1 style="color: <?= htmlspecialchars($color) ?>;">Welcome Back, <?= htmlspecialchars($name) ?>!</h1>
        <p>Your favorite color theme is applied.</p>
        <form method="POST">
            <button type="submit" name="logout">Logout</button>
        </form>
    <?php else: ?>
        <h1>Welcome!</h1>
        <?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>
        <form method="POST">
            <input type="text" name="name" placeholder="Enter your name">
            <input type="text" name="color" placeholder="Enter your favorite color (like #6b4f3b)">
            <br>
            <button type="submit">Submit</button>
        </form>
    <?php endif; ?>
</div>

<?php
// Logout functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    session_destroy();
    setcookie('name', '', time() - 3600);
    setcookie('color', '', time() - 3600);
    header("Location: welcome_user.php");
    exit();
}
?>
</body>
</html>
