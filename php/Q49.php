49. Sports Team Performance System

Program:
<?php
$players = [
    ["name" => "Player A", "runs" => 320, "wickets" => 5],
    ["name" => "Player B", "runs" => 250, "wickets" => 12],
    ["name" => "Player C", "runs" => 410, "wickets" => 3]
];

// Calculate performance index
foreach ($players as &$p) {
    $p["index"] = ($p["runs"] * 0.5) + ($p["wickets"] * 10);
}

// Sort by index (ranking)
usort($players, fn($a,$b) => $b["index"] <=> $a["index"]);

print_r($players);
?>

Output:
Array ( [0] => Array ( [name] => Player B [runs] => 250 [wickets] => 12 [index] => 245 ) [1] => Array ( [name] => Player C [runs] => 410 [wickets] => 3 [index] => 235 ) [2] => Array ( [name] => Player A [runs] => 320 [wickets] => 5 [index] => 210 ) )
