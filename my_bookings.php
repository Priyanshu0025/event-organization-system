<?php
session_start();
include("db.php");
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head><title>My Bookings</title></head>
<body>
<h2>My Event Bookings</h2>
<table border="1">
<tr><th>Event Name</th><th>Date</th><th>Venue</th><th>Booking Date</th></tr>

<?php
$sql = "SELECT e.event_name, e.event_date, e.venue, b.booking_date
        FROM bookings b
        JOIN events e ON b.event_id = e.id
        WHERE b.user_id = {$user['id']}";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    echo "<tr>
            <td>{$row['event_name']}</td>
            <td>{$row['event_date']}</td>
            <td>{$row['venue']}</td>
            <td>{$row['booking_date']}</td>
          </tr>";
}
?>
</table>
</body>
</html>
