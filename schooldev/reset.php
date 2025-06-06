<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("DELETE FROM students");
    
    if ($stmt->execute()) {
        echo "All student data has been reset.";
    } else {
        echo "Error resetting data: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
