<?php
session_start();
include("db.php");

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
<h2>Welcome, <?php echo $user['name']; ?></h2>
<p><a href="logout.php">Logout</a></p>

<?php if ($user['role'] == 'organizer') { ?>
    <h3><a href="create_event.php">Create New Event</a></h3>
<?php } ?>

<h3><a href="view_events.php">View Events</a></h3>
<h3><a href="my_bookings.php">My Bookings</a></h3>

</body>
</html>
