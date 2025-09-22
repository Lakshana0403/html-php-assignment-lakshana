39. A school wants to automate the calculation of student grades. Design a system that allows teachers to input
student scores, calculates their grades, and generates a summary report. How would you utilize arrays and
array functions to store and process the student data effectively?

<!DOCTYPE html>
<html>
<head>
    <title>Student Grade Automation</title>
</head>
<body>
<h2>Student Grade Automation System</h2>

<?php
// Function to calculate grade based on score
function calculateGrade($score) {
    if ($score >= 90) return "A";
    elseif ($score >= 80) return "B";
    elseif ($score >= 70) return "C";
    elseif ($score >= 60) return "D";
    else return "F";
}

// Initialize an empty array for students
$students = array();

// Check if form is submitted
if (isset($_POST['submit'])) {
    $names = $_POST['name'];
    $scores = $_POST['score'];

    // Store each student as an associative array
    for ($i = 0; $i < count($names); $i++) {
        $students[] = array(
            "name" => $names[$i],
            "score" => (int)$scores[$i],
            "grade" => calculateGrade((int)$scores[$i])
        );
    }

    // Display summary report
    echo "<h3>Summary Report:</h3>";
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>Name</th><th>Score</th><th>Grade</th></tr>";
    foreach ($students as $student) {
        echo "<tr>";
        echo "<td>" . $student['name'] . "</td>";
        echo "<td>" . $student['score'] . "</td>";
        echo "<td>" . $student['grade'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Optional analytics
    $scoresArray = array_column($students, 'score');
    echo "<p>Highest Score: " . max($scoresArray) . "</p>";
    echo "<p>Lowest Score: " . min($scoresArray) . "</p>";
    echo "<p>Average Score: " . (array_sum($scoresArray)/count($scoresArray)) . "</p>";
}
?>

<!-- Input form -->
<h3>Enter Student Details</h3>
<form method="post" action="">
    <div id="studentFields">
        <div>
            Name: <input type="text" name="name[]" required>
            Score: <input type="number" name="score[]" min="0" max="100" required>
        </div>
    </div>
    <button type="button" onclick="addField()">Add Another Student</button><br><br>
    <input type="submit" name="submit" value="Generate Report">
</form>

<script>
function addField() {
    let div = document.createElement("div");
    div.innerHTML = 'Name: <input type="text" name="name[]" required> Score: <input type="number" name="score[]" min="0" max="100" required>';
    document.getElementById("studentFields").appendChild(div);
}
</script>

</body>
</html>


Output:
