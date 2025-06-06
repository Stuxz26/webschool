<?php
include('db.php');

$result = $conn->query("SELECT * FROM students");

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "LRN: " . $row['lrn'] . " - Name: " . $row['first_name'] . " " . $row['last_name'] . "<br>";
        echo "Section: " . $row['section'] . " - Adviser: " . $row['adviser'] . "<br>";
        echo "School Origin: " . $row['school_origin'] . "<br><br>";
    }
} else {
    echo "No data found.";
}

$conn->close();
?>
