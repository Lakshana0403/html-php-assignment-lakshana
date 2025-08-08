23. Prioritize the use of GET and POST arguments in PHP with a real time example.

ANSWER:
<!-- save this as get_post_example.php -->
<!DOCTYPE html>
<html>
<head>
    <title>GET vs POST Example</title>
</head>
<body>

<h2>Login Form (POST Method - Secure)</h2>
<form method="post" action="">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" name="login" value="Login">
</form>

<?php
// Handle POST (Login Form)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $user = $_POST['username'];
    echo "<p><strong>Welcome, $user!</strong></p>";
}
?>

<hr>

<h2>Search Form (GET Method - Shareable)</h2>
<form method="get" action="">
    Search: <input type="text" name="query">
    <input type="submit" name="search" value="Search">
</form>

<?php
// Handle GET (Search Form)
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $search = $_GET['query'];
    echo "<p>You searched for: <strong>$search</strong></p>";
}
?>

</body>
</html>

OUTPUT:
Login Form (POST Method - Secure)
Username: 

Password: 

Search Form (GET Method - Shareable)
Search: 
 
You searched for: Lakshana







