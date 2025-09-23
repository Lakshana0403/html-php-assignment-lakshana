Create the database and the table :
CREATE DATABASE dog_adoption;

USE dog_adoption;

CREATE TABLE dogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    breed VARCHAR(50) NOT NULL,
    age INT NOT NULL,
    status ENUM('Available','Adopted') DEFAULT 'Available',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

db.php
<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "dog_adoption";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>

index.php
<?php
require 'db.php';
$message = "";

// Add dog
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $name = trim($_POST['name']);
    $breed = trim($_POST['breed']);
    $age = (int)$_POST['age'];

    if (empty($name) || empty($breed) || empty($age)) {
        $message = "<div class='alert error'>⚠️ All fields are required!</div>";
    } else {
        $sql = "INSERT INTO dogs (name, breed, age) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssi", $name, $breed, $age);
        if (mysqli_stmt_execute($stmt)) {
            $message = "<div class='alert success'>✅ Dog added successfully!</div>";
        } else {
            $message = "<div class='alert error'>❌ Error: " . mysqli_error($conn) . "</div>";
        }
    }
}

// Adopt dog
if (isset($_GET['adopt'])) {
    $id = (int)$_GET['adopt'];
    mysqli_query($conn, "UPDATE dogs SET status='Adopted' WHERE id=$id");
    header("Location: index.php");
    exit;
}

// Fetch dogs
$result = mysqli_query($conn, "SELECT * FROM dogs ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>🐾 Dog Adoption Center</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #fceabb, #f8b500);
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        h2 {
            text-align: center;
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        input, button {
            flex: 1;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 1rem;
        }
        button {
            background: #ff7f50;
            color: white;
            border: none;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #ff5722;
        }
        .alert {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
            text-align: center;
            font-weight: 600;
        }
        .alert.success {
            background: #d4edda;
            color: #155724;
        }
        .alert.error {
            background: #f8d7da;
            color: #721c24;
        }
        .dog-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            margin-top: 25px;
        }
        .dog-card {
            background: #fff8f0;
            padding: 15px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: transform 0.2s ease-in-out;
        }
        .dog-card:hover {
            transform: translateY(-5px);
        }
        .dog-card h4 {
            margin: 5px 0;
            color: #333;
        }
        .dog-card p {
            margin: 5px 0;
            font-size: 0.9rem;
            color: #555;
        }
        .status {
            font-weight: bold;
            display: block;
            margin: 8px 0;
        }
        .status.available { color: green; }
        .status.adopted { color: gray; font-style: italic; }
        .adopt-btn {
            display: inline-block;
            padding: 8px 12px;
            background: #28a745;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            transition: background 0.3s;
        }
        .adopt-btn:hover {
            background: #218838;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>🐾 Dog Adoption Center</h2>
    <?php echo $message; ?>

    <form method="POST">
        <div class="form-group">
            <input type="text" name="name" placeholder="Dog Name">
            <input type="text" name="breed" placeholder="Breed">
            <input type="number" name="age" placeholder="Age (Years)">
            <button type="submit" name="add">➕ Add Dog</button>
        </div>
    </form>

    <div class="dog-list">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="dog-card">
            <h4><?php echo htmlspecialchars($row['name']); ?></h4>
            <p><strong>Breed:</strong> <?php echo htmlspecialchars($row['breed']); ?></p>
            <p><strong>Age:</strong> <?php echo $row['age']; ?> years</p>
            <span class="status <?php echo strtolower($row['status']); ?>">
                <?php echo $row['status']; ?>
            </span>
            <?php if ($row['status'] == 'Available') { ?>
                <a class="adopt-btn" href="?adopt=<?php echo $row['id']; ?>">Adopt</a>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</div>
</body>
</html>
