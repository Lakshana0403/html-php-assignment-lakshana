48. Record number handling in PHP with suitable examples.

Program:
<?php
// Initial records (array of students)
$students = ["Lakshana", "Arun", "Priya", "Kavin"];

// Function to display all records
function displayRecords($students) {
    echo "📋 Records:\n";
    foreach ($students as $index => $name) {
        echo "Record $index: $name\n";
    }
    echo "Total Records: " . count($students) . "\n\n";
}

// 1. Display original records
displayRecords($students);

// 2. Insert a new record
$students[] = "Mani";   // append to array
echo "✅ After Inserting 'Mani':\n";
displayRecords($students);

// 3. Update a record (change Priya → Preethi)
$students[2] = "Preethi";
echo "✏️ After Updating Record 2:\n";
displayRecords($students);

// 4. Delete a record (remove Arun at index 1)
unset($students[1]);
$students = array_values($students); // reindex
echo "❌ After Deleting Record 1 (Arun):\n";
displayRecords($students);

// 5. Access record by record number
$recordNum = 2;
echo "🔎 Record $recordNum is: " . $students[$recordNum] . "\n";
?>


Output:
📋 Records:
Record 0: Lakshana
Record 1: Arun
Record 2: Priya
Record 3: Kavin
Total Records: 4

✅ After Inserting 'Mani':
Record 0: Lakshana
Record 1: Arun
Record 2: Priya
Record 3: Kavin
Record 4: Mani
Total Records: 5

✏️ After Updating Record 2:
Record 0: Lakshana
Record 1: Arun
Record 2: Preethi
Record 3: Kavin
Record 4: Mani
Total Records: 5

❌ After Deleting Record 1 (Arun):
Record 0: Lakshana
Record 1: Preethi
Record 2: Kavin
Record 3: Mani
Total Records: 4

🔎 Record 2 is: Kavin
