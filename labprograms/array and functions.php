<?php
// Function to calculate total marks
function calculateTotal($marks) {
    return array_sum($marks);
}

// Function to calculate average marks
function calculateAverage($marks) {
    return count($marks) ? array_sum($marks)/count($marks) : 0;
}

// Function to determine grade
function getGrade($avg) {
    if ($avg >= 90) return "A+";
    elseif ($avg >= 80) return "A";
    elseif ($avg >= 70) return "B";
    elseif ($avg >= 60) return "C";
    elseif ($avg >= 50) return "D";
    else return "F";
}

// Function to get highest mark
function getHighest($marks) {
    return max($marks);
}

// Function to get lowest mark
function getLowest($marks) {
    return min($marks);
}

// Initialize arrays
$students = [];
$results = [];

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $students = $_POST['students'] ?? [];
    
    foreach ($students as $name => $marks) {
        $marks = array_map('intval', $marks); // Convert to integers
        $total = calculateTotal($marks);
        $average = calculateAverage($marks);
        $grade = getGrade($average);
        $highest = getHighest($marks);
        $lowest = getLowest($marks);

        $results[$name] = [
            'marks' => $marks,
            'total' => $total,
            'average' => $average,
            'grade' => $grade,
            'highest' => $highest,
            'lowest' => $lowest
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Grade Calculator</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #f0f0f5;
    color: #333;
    padding: 20px;
}
h1 { text-align: center; color: #2c3e50; }
form {
    max-width: 700px;
    margin: auto;
    background: #fff;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}
.student-block {
    border: 1px solid #ddd;
    padding: 15px;
    margin-bottom: 15px;
    border-radius: 10px;
    background: #f9f9f9;
}
.student-block h3 { margin-bottom: 10px; color: #34495e; }
input[type="text"], input[type="number"] {
    width: calc(33% - 10px);
    padding: 8px;
    margin: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
}
button {
    margin-top: 15px;
    padding: 10px 20px;
    background: #2c3e50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
button:hover { background: #34495e; }
.results {
    max-width: 700px;
    margin: 30px auto;
    padding: 20px;
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}
.results h2 { text-align:center; color: #2c3e50; }
.results table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}
.results table, th, td { border: 1px solid #ccc; }
th, td { padding: 10px; text-align: center; }
th { background: #34495e; color: white; }
tr:nth-child(even) { background: #f2f2f2; }
</style>
</head>
<body>

<h1>Student Grade Calculator</h1>

<form method="POST">
    <?php for($i=1; $i<=3; $i++): ?>
        <div class="student-block">
            <h3>Student <?= $i ?></h3>
            <input type="text" name="students[Student<?= $i ?>][0]" placeholder="Student Name" required>
            <input type="number" name="students[Student<?= $i ?>][1]" placeholder="Subject 1" min="0" max="100" required>
            <input type="number" name="students[Student<?= $i ?>][2]" placeholder="Subject 2" min="0" max="100" required>
            <input type="number" name="students[Student<?= $i ?>][3]" placeholder="Subject 3" min="0" max="100" required>
        </div>
    <?php endfor; ?>
    <button type="submit">Calculate Grades</button>
</form>

<?php if(!empty($results)): ?>
<div class="results">
    <h2>Results</h2>
    <table>
        <tr>
            <th>Student</th>
            <th>Marks</th>
            <th>Total</th>
            <th>Average</th>
            <th>Grade</th>
            <th>Highest</th>
            <th>Lowest</th>
        </tr>
        <?php foreach($results as $name => $data): ?>
        <tr>
            <td><?= $name ?></td>
            <td><?= implode(', ', array_slice($data['marks'], 1)) ?></td>
            <td><?= $data['total'] ?></td>
            <td><?= number_format($data['average'], 2) ?></td>
            <td><?= $data['grade'] ?></td>
            <td><?= $data['highest'] ?></td>
            <td><?= $data['lowest'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php endif; ?>

</body>
</html>
