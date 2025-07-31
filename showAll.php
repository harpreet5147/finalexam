<?php
session_start();
require_once 'db/conn.php';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = mysqli_real_escape_string($conn, $_POST['string_id']);
    $sql = "DELETE FROM string_info WHERE string_id = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted!";
    }
}

$sql = "SELECT * FROM string_info";
$result = mysqli_query($conn, $sql);

echo "<h3>All Records</h3>";
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo  htmlspecialchars($row['message']) . "<br>";
    }
} else {
    echo "no records.";
}
?>

<form method="POST">
    <input type="number" name="string_id" placeholder="Enter ID to delete" required>
    <button type="submit" name="delete">Delete</button>
</form>

</body>
</html>
