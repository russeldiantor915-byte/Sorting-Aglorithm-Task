<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bubble Sort with PHP</title>
</head>
<body>
    <h2>Bubble Sort Program</h2>
    <form method="post">
        <label for="numbers">Enter numbers (comma separated):</label>
        <input type="text" name="numbers" id="numbers" required><br><br>

        <label for="order">Choose order:</label>
        <select name="order" id="order" required>
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
        </select><br><br>

        <input type="submit" value="Sort">
    </form>

    <?php
        // Function to perform bubble sort and return the number of swaps
        function bubbleSort($arr, $order) {
            $n = count($arr);
            $swapCount = 0;
            $sorted = false;

            // Bubble Sort Algorithm
            while (!$sorted) {
                $sorted = true;
                for ($i = 0; $i < $n - 1; $i++) {
                    // Check if sorting in ascending or descending order
                    if (($order == "asc" && $arr[$i] > $arr[$i + 1]) || ($order == "desc" && $arr[$i] < $arr[$i + 1])) {
                        // Swap the elements
                        $temp = $arr[$i];
                        $arr[$i] = $arr[$i + 1];
                        $arr[$i + 1] = $temp;

                        // Increase swap count
                        $swapCount++;
                        $sorted = false; // Set sorted to false as we performed a swap
                    }
                }
            }

            return [$arr, $swapCount];
        }

        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the input data
            $numbers = explode(',', $_POST['numbers']);  // Split input into an array
            $numbers = array_map('trim', $numbers); // Remove any extra spaces
            $numbers = array_map('intval', $numbers); // Convert to integers
            $order = $_POST['order'];

            // Print original array
            echo "<h3>Original Array:</h3>";
            echo "<pre>" . print_r($numbers, true) . "</pre>";

            // Perform sorting
            list($sortedArray, $swapCount) = bubbleSort($numbers, $order);

            // Print sorted array and swap count
            echo "<h3>Sorted Array (" . strtoupper($order) . "):</h3>";
            echo "<pre>" . print_r($sortedArray, true) . "</pre>";

            echo "<h3>Total Swaps:</h3>";
            echo $swapCount;
        }
    ?>
</body>
</html>
