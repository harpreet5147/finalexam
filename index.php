<?php
session_start();
require_once 'db/conn.php';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO string_info (message) VALUES ('$message')";

    if (mysqli_query($conn, $sql)) {
        echo "Message inserted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<form method="POST">
    <input type="text" name="message" placeholder="Enter a message" required>
    <button type="submit" name="submit">Submit</button>
</form>

<a href="showAll.php">Show all records</a>

</body>
</html>
