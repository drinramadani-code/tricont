<?php 
include 'dbh.php';
$cek = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM events WHERE id=". $_GET['b'])); 
$participants = "";
foreach (explode(", ", $cek['event_participants']) as $p) {
	$participants .= getUser($p)['full_name'] . ", ";
}
$participants = rtrim($participants, ', ');
echo $participants;
?>