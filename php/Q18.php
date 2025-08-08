18. IsSet() function in PHP with example.

ANSWER:
<?php
$name = "Lakshana";

if (isset($name)) {
    echo "The variable 'name' is set and its value is: $name";
} else {
    echo "The variable 'name' is not set.";
}

unset($name); // Unset the variable

if (isset($name)) {
    echo "The variable 'name' is still set.";
} else {
    echo "The variable 'name' is now unset.";
}
?>

OUTPUT:
The variable 'name' is set and its value is: LakshanaThe variable 'name' is now unset.
