<?php 
include 'dbh.php';
$cek = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM events WHERE id=". $_GET['t'])); 
$participants = "";
foreach (explode(", ", $cek['event_participants']) as $p) {
	$participant = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id=$p;"));
	$participants .= $participant['full_name'] . ", ";
}
?>
<div class="cek">
	<div class="cek-header">
		<div class="cek-header-name"><?php echo $cek['event_name']; ?> </div>
		.cek-header
	</div>
</div>