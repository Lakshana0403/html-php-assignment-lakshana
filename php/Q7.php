QUESTION:
Create a form which takes the name of the user as input and prints a greeting in the format
given below and if the user submits the form with the name field blank, it prints an
appropriate error message.

Hello, Welcome to Everyone!
Have a nice day!!

ANSWER:
<?php

echo "Enter your name: ";
$name = trim(fgets(STDIN));

if (empty($name)) {
    echo "Error: Name field cannot be blank.\n";
} else {
    echo "Hello, $name! Welcome to Everyone!\n";
    echo "Have a nice day!!\n";
}

?>

OUTPUT:
Enter your name: lakshana
Hello, lakshana! Welcome to Everyone!
Have a nice day!!
