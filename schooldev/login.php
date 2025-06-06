<?php
$host = "localhost";
$user = "root"; // change this if your MySQL user is different
$pass = "";     // change this to your MySQL password
$db = "login_system";

// Connect to database
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$username = $_POST['username'];
$password = $_POST['password'];

// Protect against SQL injection
$username = mysqli_real_escape_string($conn, $username);
$password = md5($password); // Same hash as stored

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    header("Location: WEBDEV HOMEPAGE.html");
    exit();
} else {
    echo "<script>alert('Login failed!'); window.history.back();</script>";
}
?>
