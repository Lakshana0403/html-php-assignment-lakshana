26. Construct a php program to create a chess board in PHP using the “For” loop.

ANSWER:
<!DOCTYPE html>
<html>
<head>
    <title>PHP Chess Board</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px;
        }
        td {
            width: 60px;
            height: 60px;
        }
        .white {
            background-color: #fff;
        }
        .black {
            background-color: #000;
        }
    </style>
</head>
<body>

<h2>Chess Board</h2>

<table border="1">
<?php
for ($row = 1; $row <= 8; $row++) {
    echo "<tr>";
    for ($col = 1; $col <= 8; $col++) {
        $total = $row + $col;
        if ($total % 2 == 0) {
            echo "<td class='white'></td>";
        } else {
            echo "<td class='black'></td>";
        }
    }
    echo "</tr>";
}
?>
</table>

</body>
</html>

OUTPUT:
It'll create a chess board
