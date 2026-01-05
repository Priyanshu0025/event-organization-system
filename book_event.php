<?php
session_start();
include("db.php");
$user = $_SESSION['user'];
$eid = $_GET['id'];

$sql = "INSERT INTO bookings (user_id, event_id, booking_date) 
        VALUES ('{$user['id']}', '$eid', NOW())";
if (mysqli_query($conn, $sql)) {
    echo "Event booked successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
<br><a href="view_events.php">Back to Events</a>
