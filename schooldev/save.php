<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lrn = $_POST['lrn'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $section = $_POST['section'];
    $adviser = $_POST['adviser'];
    $school_origin = $_POST['school_origin'];
    $remarks = $_POST['remarks'];

    $stmt = $conn->prepare("INSERT INTO students (lrn, last_name, first_name, middle_name, section, adviser, school_origin, remarks) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssssss', $lrn, $last_name, $first_name, $middle_name, $section, $adviser, $school_origin, $remarks);
    
    if ($stmt->execute()) {
        echo "Student data saved successfully.";
    } else {
        echo "Error saving data: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
