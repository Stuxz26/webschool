<?php
$data = json_decode(file_get_contents('php://input'), true);

// Database connection (replace with your credentials)
$conn = new mysqli('localhost', 'username', 'password', 'database_name');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$school_name = $data['school_name'];
$semester = $data['semester'];
$section_name = $data['section_name'];
$track_name = $data['track_name'];

// Insert school info
$sql = "INSERT INTO school_info (school_name, semester, section_name, track_name) VALUES ('$school_name', '$semester', '$section_name', '$track_name')";
$conn->query($sql);

// Insert student data
foreach ($data['students'] as $student) {
    $lrn = $student['lrn'];
    $name = $student['name'];
    $school_origin = $student['school_origin'];
    $remarks = $student['remarks'];
    
    $sql = "INSERT INTO students (lrn, name, school_origin, remarks) VALUES ('$lrn', '$name', '$school_origin', '$remarks')";
    $conn->query($sql);
}

$conn->close();
echo json_encode(['success' => true]);
?>
