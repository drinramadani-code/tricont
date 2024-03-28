<?php include '../dbh.php'; ?>
<link rel="stylesheet" href="../assets/css/main.min.css">
<div class="add_event">
	<img class="add_event-logo" src="../assets/images/logo.png" alt="">
	<form action="add_event.php" class="add_event_form" method="GET">
		<input type="text" name="event_name" placeholder="Emri i eventit">
		<input type="submit" value="Krijo Event">
		<input class="hidden_field" type="text" name="event_leader" value="<?php echo $_SESSION['user']['id']; ?>">
	</form>
</div>