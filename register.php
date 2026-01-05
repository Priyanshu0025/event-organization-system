<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
<title>Register - Event System</title>
</head>
<body>
<h2>User Registration</h2>
<form method="POST">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    Role: 
    <select name="role">
        <option value="user">User</option>
        <option value="organizer">Organizer</option>
    </select><br><br>
    <input type="submit" name="register" value="Register">
</form>

<?php
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $role = $_POST['role'];

    $sql = "INSERT INTO users (name,email,password,role) VALUES ('$name','$email','$pass','$role')";
    if (mysqli_query($conn, $sql)) {
        echo "Registration Successful!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
</body>
</html>
