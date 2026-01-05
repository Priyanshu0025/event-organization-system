<?php
session_start();
include("db.php");
$user = $_SESSION["user"];
?>
<!DOCTYPE html>
<html>
<head><title>All Events</title></head>
<body>
<h2>Available Events</h2>
<table border="1">
<tr><th>Name</th><th>Date</th><th>Venue</th><th>Description</th><th>Action</th></tr>

<?php
$sql = "SELECT * FROM events";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    echo "<tr>
            <td>{$row['event_name']}</td>
            <td>{$row['event_date']}</td>
            <td>{$row['venue']}</td>
            <td>{$row['description']}</td>
            <td><a href='book_event.php?id={$row['id']}'>Book</a></td>
          </tr>";
}
?>
</table>
</body>
</html>
