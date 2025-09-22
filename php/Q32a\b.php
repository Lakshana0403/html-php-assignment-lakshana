32. Infer the result of the following PHP code?
a.<?php
$mail = "admin@example.com";
$mail = str_replace("a","@",$mail);
echo "Contact me at $mail.";
?>
b. Determine the result of the following PHP code?
<?php
$names = array("alex", "jean", "emily", "jane");
$name = preg_grep("/^e/", $names);
print_r($name);
?>

Program:
<?php
$mail = "admin@example.com";
$mail = str_replace("a","@",$mail);
echo "Contact me at $mail.";
?>

Output:
Contact me at @dmin@ex@mple.com.

<?php
$names = array("alex", "jean", "emily", "jane");
$name = preg_grep("/^e/", $names);
print_r($name);
?>

Output:
Array
(
    [2] => emily
)
