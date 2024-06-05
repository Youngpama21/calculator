<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .calculator {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            text-align: center;
        }
        .calculator input, .calculator select, .calculator button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Calculator</h2>
        <form method="post">
            <input type="number" name="num1" step="any" placeholder="Enter first number" required>
            <input type="number" name="num2" step="any" placeholder="Enter second number (if needed)">
            <select name="operation" required>
                <option value="add">Addition</option>
                <option value="subtract">Subtraction</option>
                <option value="multiply">Multiplication</option>
                <option value="divide">Division</option>
                <option value="exponentiate">Exponentiation</option>
                <option value="percentage">Percentage</option>
                <option value="sqrt">Square Root</option>
                <option value="log">Logarithm</option>
            </select>
            <button type="submit">Calculate</button>
        </form>
        <div id="result">
            <!-- The result will be displayed here -->
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                function calculate($num1, $num2, $operation) {
                    switch ($operation) {
                        case 'add':
                            return $num1 + $num2;
                        case 'subtract':
                            return $num1 - $num2;
                        case 'multiply':
                            return $num1 * $num2;
                        case 'divide':
                            if ($num2 == 0) {
                                return "Error: Division by zero";
                            }
                            return $num1 / $num2;
                        case 'exponentiate':
                            return pow($num1, $num2);
                        case 'percentage':
                            return ($num1 * $num2) / 100;
                        case 'sqrt':
                            return sqrt($num1);
                        case 'log':
                            if ($num1 <= 0) {
                                return "Error: Logarithm of non-positive number";
                            }
                            return log($num1);
                        default:
                            return "Invalid operation";
                    }
                }

                $num1 = isset($_POST['num1']) ? (float)$_POST['num1'] : 0;
                $num2 = isset($_POST['num2']) ? (float)$_POST['num2'] : 0;
                $operation = isset($_POST['operation']) ? $_POST['operation'] : '';

                $result = calculate($num1, $num2, $operation);

                echo "<p>Result: " . htmlspecialchars($result) . "</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
