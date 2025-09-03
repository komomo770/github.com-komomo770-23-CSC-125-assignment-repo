<?php
// Database credentials
$host = 'localhost';
$dbname = 'student_db';
$username = 'root';
$password = ''; // set your MySQL root password if any

// Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Validate and sanitize inputs
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $department = trim($_POST['department']);
    $matric_number = trim($_POST['matric_number']);

    if (empty($full_name) || empty($email) || empty($department) || empty($matric_number)) {
        die('All fields are required. <a href="index.php">Go back</a>');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Invalid email address. <a href="index.php">Go back</a>');
    }

    // Prepare and bind statement to insert data securely
    $stmt = $conn->prepare("INSERT INTO student_records (full_name, email, department, matric_number) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $full_name, $email, $department, $matric_number);

    if ($stmt->execute()) {
        echo "Registration successful! <a href=\"index.php\">Register another student</a> | <a href=\"view.php\">View students</a>";
    } else {
        echo "Error: " . $conn->error . " <a href=\"index.php\">Go back</a>";
    }

    $stmt->close();
}

$conn->close();
?>
