<?php
// Database credentials
$host = 'localhost';
$dbname = 'student_db';
$username = 'root';
$password = ''; // set your MySQL root password if any

// Connect to database
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Handle delete action
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $conn->query("DELETE FROM student_records WHERE id = $delete_id");
    header('Location: view.php');
    exit;
}

// Fetch all students
$result = $conn->query("SELECT * FROM student_records");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registered Students</title>
</head>
<body>
<h2>Registered Students</h2>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Matric Number</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result->num_rows > 0) : ?>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?= htmlspecialchars($row['full_name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['department']) ?></td>
                    <td><?= htmlspecialchars($row['matric_number']) ?></td>
                    <td><a href="view.php?delete_id=<?= $row['id'] ?>" onclick="return confirm('Delete this student?')">Delete</a></td>
                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <tr><td colspan="5">No students registered yet.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<br>
<a href="index.php">Register New Student</a>

</body>
</html>

<?php
$conn->close();
?>