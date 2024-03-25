<?php include '../dbh.php'; ?>
<link rel="stylesheet" href="../assets/css/main.min.css">
<div class="add_event">
	<form action="add_event.php" class="add_event_form" method="GET">
		<h3>Event Name</h3>
		<input type="text" name="event_name" placeholder="Event Name">
		<input type="submit" value="Create Event">
		<input class="hidden_field" type="text" name="event_leader" value="<?php echo $_SESSION['user']['id']; ?>">
	</form>
</div>