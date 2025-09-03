<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>
<h2>Student Registration Form</h2>
<form action="process.php" method="post">
    <label for="full_name">Full Name:</label><br>
    <input type="text" id="full_name" name="full_name" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="department">Department:</label><br>
    <input type="text" id="department" name="department" required><br><br>

    <label for="matric_number">Matric Number:</label><br>
    <input type="text" id="matric_number" name="matric_number" required><br><br>

    <input type="submit" value="Register">
</form>

<br>
<a href="view.php">View Registered Students</a>
</body>
</html>