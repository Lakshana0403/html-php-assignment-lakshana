<?php
$uploadDir = "uploads/";
$uploadFile = "";
$success = "";
$error = "";

// Create uploads directory if not exists
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profile_image']['tmp_name'];
        $fileName = basename($_FILES['profile_image']['name']);
        $fileSize = $_FILES['profile_image']['size'];
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($fileType, $allowedTypes)) {
            $error = "Only JPG, JPEG, PNG, and GIF files are allowed.";
        } elseif ($fileSize > 2 * 1024 * 1024) {
            $error = "File size must be less than 2MB.";
        } else {
            $newFileName = uniqid("img_") . "." . $fileType;
            $destPath = $uploadDir . $newFileName;
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $success = "File uploaded successfully!";
                $uploadFile = $destPath;
            } else {
                $error = "There was an error moving the uploaded file.";
            }
        }
    } else {
        $error = "Please select a file to upload.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profile Image Upload</title>
<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg,#f0e6d2,#f9f4ef);
    margin:0; padding:0;
    display:flex; justify-content:center; align-items:center; min-height:100vh;
}
.container {
    background:#fff5e6;
    padding:40px;
    border-radius:20px;
    box-shadow:0 8px 25px rgba(0,0,0,0.1);
    text-align:center;
    width: 90%;
    max-width: 400px;
}
h1 { color:#6b4f3b; margin-bottom:20px; }
input[type="file"] {
    margin-top:15px;
    padding:10px;
    border-radius:10px;
    border:1px solid #d1bfa7;
    width:100%;
}
button {
    margin-top:20px;
    padding:12px 25px;
    background:#6b4f3b;
    color:white;
    border:none;
    border-radius:50px;
    cursor:pointer;
    transition:0.3s;
}
button:hover { background:#8c654c; transform:translateY(-2px);}
.success { color: #155724; background:#d4edda; padding:10px; border-radius:10px; margin-top:15px;}
.error { color: #721c24; background:#f8d7da; padding:10px; border-radius:10px; margin-top:15px;}
img.uploaded { margin-top:20px; max-width:100%; border-radius:15px; box-shadow:0 5px 15px rgba(0,0,0,0.2);}
</style>
</head>
<body>

<div class="container">
    <h1>Upload Your Profile Picture</h1>

    <?php if($success) echo "<div class='success'>$success</div>"; ?>
    <?php if($error) echo "<div class='error'>$error</div>"; ?>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="profile_image" accept="image/*">
        <button type="submit">Upload</button>
    </form>

    <?php if($uploadFile): ?>
        <img src="<?= htmlspecialchars($uploadFile) ?>" alt="Uploaded Image" class="uploaded">
    <?php endif; ?>
</div>

</body>
</html>
