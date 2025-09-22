42. Write a PHP script to find the maximum and minimum marks from the following set of arrays

$marks1 = array(360,310,310,330,313,375,456,111,256);
$marks2 = array(350,340,356,330,321);
$marks3 = array(630,340,570,635,434,255,298);

Program:
<?php
// Given arrays
$marks1 = array(360,310,310,330,313,375,456,111,256);
$marks2 = array(350,340,356,330,321);
$marks3 = array(630,340,570,635,434,255,298);

// Merge all arrays into one
$allMarks = array_merge($marks1, $marks2, $marks3);

// Find maximum and minimum marks
$maxMark = max($allMarks);
$minMark = min($allMarks);

// Display results
echo "Maximum Mark: $maxMark <br>";
echo "Minimum Mark: $minMark <br>";
?>

Output:
Maximum Mark: 635
Minimum Mark: 111
