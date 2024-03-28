<?php 
include 'dbh.php';

$cek = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM events WHERE id=". $_GET['t'])); 
$user = $_SESSION['user'];
?>
<div class="AddCek">
	<div class="AddCek-header">
		<div class="AddCek-header-cancel">
			<a href="<?php echo $_SESSION['permalink']; ?>?t=<?php echo $_GET['t']; ?>"><i class="fa fa-angle-left"></i>Anulo</a>
		</div>
		<div class="AddCek-header-name">Cek i ri</div>
	</div>
	<form action="dashboard/cek/add_cek_logic.php" method="GET">
		<input type="text" value="<?php echo $_GET['t']; ?>" name="cek_id" class="hidden_field"/>
		<input type="text" value="<?php echo $user['id']; ?>" name="paid_by"  class="hidden_field"/>
		<input type="text" placeholder="Titulli" name="title" />
		<input type="date" placeholder="Data" name="date" />
		<input type="text" placeholder="Totali(€)" name="amount" />
		<!-- <select name="for_who" id=""> -->
		<?php  
			foreach (explode(", ", $cek['event_participants']) as $i=>$p) {
		?>
			<div>
				<input type="checkbox" name="p" value="<?php echo getUser($p)['id']; ?>" />
				<label for="p_<?php echo $i+1; ?>"><?php echo getUser($p)['full_name']; ?> </label>
			</div>
		<?php
			}
		?>
		<input type="text" name="for_who" class="hidden_field">
		<!-- </select> -->
		<button type="submit">Shto Cek</button>
	</form>
</div>