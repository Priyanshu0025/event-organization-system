<?php
session_start();
include("db.php");
$user = $_SESSION['user'];

if ($user['role'] != 'organizer') {
    echo "Access denied!";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Create Event</title></head>
<body>
<h2>Create Event</h2>
<form method="POST">
    Event Name: <input type="text" name="event_name" required><br><br>
    Date: <input type="date" name="event_date" required><br><br>
    Venue: <input type="text" name="venue" required><br><br>
    Description: <textarea name="description"></textarea><br><br>
    <input type="submit" name="create" value="Create Event">
</form>

<?php
if (isset($_POST['create'])) {
    $name = $_POST['event_name'];
    $date = $_POST['event_date'];
    $venue = $_POST['venue'];
    $desc = $_POST['description'];
    $uid = $user['id'];

    $sql = "INSERT INTO events (event_name,event_date,venue,description,created_by)
            VALUES ('$name','$date','$venue','$desc','$uid')";
    if (mysqli_query($conn, $sql)) {
        echo "Event Created Successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
</body>
</html>
