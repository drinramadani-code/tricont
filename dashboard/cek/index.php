<?php 
include 'dbh.php';
$cek = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM events WHERE id=". $_GET['t'])); 
$participants = "";
foreach (explode(", ", $cek['event_participants']) as $p) {
	$participants .= getUser($p)['full_name'] . ", ";
}
$participants = rtrim($participants, ', ');
?>
<div class="cek">
	<div class="cek-header">
		<a class="cek-header-left" href="<?php echo $permalink; ?>"><i class="fa-solid fa-angle-left"></i></a>

		<div class="cek-header-right">
			<div class="cek-header-right-name"><?php echo $cek['event_name']; ?> </div>
			<div class="cek-header-right-participants"><?php echo $participants; ?></div>
		</div>
		<a href="<?php echo $permalink; ?>?b=<?php echo $_GET['t']; ?>" class="cek-header-expenses">e</a>
		<!-- <div class="cek-header"></div> -->
	</div>
	<!-- <br><br> -->
	<div class="cek-body">
		<?php $total_expenses = 0; ?>
		<?php $my_total = 0; ?>
		<?php $query = mysqli_query($conn, "SELECT * FROM expenses WHERE cek_id=".$cek['id']); ?>
		<?php while ($expense = mysqli_fetch_assoc($query)) { ?>
		<a class="cek-body-single" href="<?php echo $permalink; ?>?c=<?php echo $expense['id']; ?>">
			<div class="cek-body-single-left">
				<div class="cek-body-single-left-title"><?php echo $expense['title'] ?></div>
				<div class="cek-body-single-left-paid-by">paid by &mdash; <span><?php echo explode(" ", getUser($expense['paid_by'])['full_name'])[0]; ?></span></div>
			</div>
			<div class="cek-body-single-right">
				<div class="cek-body-single-right-price"><?php echo $expense['amount'] ?>€</div>
				<div class="cek-body-single-right-date"><?php echo $expense['date'] ?></div>
			</div>
		</a>
		<?php $total_expenses += floatval($expense['amount']); ?>
		<?php $my_total += floatval($expense['amount'] / count(explode(",", $expense['for_whom']))); ?>
		<?php // echo $expense['amount'] . " " . count(explode(",", $expense['for_whom'])); ?>
		<?php } ?>
	</div>
	<div class="cek-footer">
		<div class="cek-footer-my-total">
			<p class="cek-footer-my-total-gray">My Total</p>
			<span class="cek-footer-my-total-amount"><?php echo number_format((float)$my_total, 2, '.', ''); ?>€</span>
		</div>
		<div class="cek-footer-plus"><a href="<?php echo $_SESSION['permalink']; ?>?t=<?php echo $_GET['t']; ?>&a">+</a></div>
		<div class="cek-footer-total-expenses">
			<p class="cek-footer-total-expenses-gray">TOTAL EXPENSES</p>
			<span class="cek-footer-total-expenses-amount"><?php echo number_format((float)$total_expenses, 2, '.', ''); ?>€</span>
		</div>
	</div>
</div>
