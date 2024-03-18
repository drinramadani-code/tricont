<?php

$j = $_GET['j'];

$event = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM events WHERE id=$j; "));

if (in_array($_SESSION['user']['id'], explode(", ", $event['event_participants']))) {
	echo "already here";
} else {
	echo "joining";
}