<?php
// save_data.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$data = json_decode(file_get_contents('php://input'), true);

$schoolName = $data['schoolName'];
$semester = $data['semester'];
$sectionName = $data['sectionName'];
$trackName = $data['trackName'];
$maleNew = $data['maleNew'];
$maleOld = $data['maleOld'];
$maleTotal = $data['maleTotal'];
$femaleNew = $data['femaleNew'];
$femaleOld = $data['femaleOld'];
$femaleTotal = $data['femaleTotal'];
$newTotal = $data['newTotal'];
$oldTotal = $data['oldTotal'];
$grandTotal = $data['grandTotal'];

// SQL query to insert data
$sql = "INSERT INTO student_profile (school_name, semester, section_name, track_name, male_new, male_old, male_total, female_new, female_old, female_total, new_total, old_total, grand_total)
        VALUES ('$schoolName', '$semester', '$sectionName', '$trackName', '$maleNew', '$maleOld', '$maleTotal', '$femaleNew', '$femaleOld', '$femaleTotal', '$newTotal', '$oldTotal', '$grandTotal')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $conn->error]);
}

$conn->close();
?>
