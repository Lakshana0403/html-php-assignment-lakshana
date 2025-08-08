QUESTIONS 8:
A customer visits a shop to buy a soft drink; he has two options:
Drink A cost is Rs.25 and the size of the bottle is 11.
Drink B cost is Rs.23 and its size of the bottle is 9.
Which drink should he choose to save money? Solve this problem using function deal ( ).


ANSWER:
<!DOCTYPE html>
<html>
<head>
    <title>Best Drink Deal</title>
</head>
<body>
    <h2>Soft Drink Comparison</h2>
    <p>Drink A: ₹25 for 11 units</p>
    <p>Drink B: ₹23 for 9 units</p>

    <button onclick="deal()">Find Best Deal</button>

    <p id="result"></p>

    <script>
        function deal() {
            let costA = 25, sizeA = 11;
            let costB = 23, sizeB = 9;

            let unitA = costA / sizeA;
            let unitB = costB / sizeB;

            let result = "";

            if (unitA < unitB) {
                result = "Drink A is the better deal.";
            } else if (unitB < unitA) {
                result = "Drink B is the better deal.";
            } else {
                result = "Both drinks offer the same value.";
            }

            document.getElementById("result").innerText = result;
        }
    </script>
</body>
</html>

OUTPUT:
Soft Drink Comparison
Drink A: ₹25 for 11 units
Drink B: ₹23 for 9 units
Find Best Deal
