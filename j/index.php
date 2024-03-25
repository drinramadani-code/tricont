<?php
echo $_GET['sk'];

include '../dbh.php';

if (isset($_SESSION['user'])) {
	$sk = $_GET['sk'];
	$event_r = mysqli_query($conn, "SELECT * FROM events WHERE event_sk='$sk'");
	if (mysqli_num_rows($event_r) > 0) {
		while ($event = mysqli_fetch_assoc($event_r)) {
			$ps = $event['event_participants'];
			if (in_array($_SESSION['user']['id'], explode(", ", $event['event_participants']))) {
				// continue;
				header("Location: ../?alreadyhere");	
			} else {
				$ps .= ", " . $_SESSION['user']['id'];
				mysqli_query($conn, "UPDATE events SET event_participants='$ps' WHERE id=".$event['id']);
				header("Location: ../?added");	
			}
		}
	} else {
		header("Location: ../?notvalidsk");	
	}

} else {
	header("Location: ../");
}