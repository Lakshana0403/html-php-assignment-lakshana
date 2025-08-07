QUESTION 5:
You are building a website where users can calculate the total cost of their purchases.
Write a PHP program that takes the price and quantity of three items from the user and
calculates the subtotal, tax (10% of the subtotal),and the total cost (subtotal + tax).
Display the results to the user.

ANSWER:
// Sample input (replace with actual $_POST or form values in full application)
$price1 = 100;
$qty1 = 2;
$price2 = 50;
$qty2 = 3;
$price3 = 80;
$qty3 = 1;

// Calculations
$subtotal = ($price1 * $qty1) + ($price2 * $qty2) + ($price3 * $qty3);
$tax = $subtotal * 0.10;
$total = $subtotal + $tax;

// Output
echo "Subtotal: ₹" . number_format($subtotal, 2) . "\n";
echo "Tax (10%): ₹" . number_format($tax, 2) . "\n";
echo "Total Cost: ₹" . number_format($total, 2);

OUTPUT:
Subtotal: ₹430.00 Tax (10%): ₹43.00 Total Cost: ₹473.00
