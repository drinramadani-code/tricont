<?php 
include 'dbh.php';
$expense = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM expenses WHERE id=". $_GET['c'])); 
$amount = floatval($expense['amount']);
$amount_per = $amount / count(explode(",", $expense['for_whom']));
?>
<div class="expense">
	<div class="expense-header">
		<a href="<?php echo $permalink;?>?t=<?php echo $expense['cek_id']; ?>">
			<i class="fa fa-angle-left"></i>
			Prapa
		</a>
	</div>
	<div class="expense-uheader">
		<h3><?php echo $expense['title']; ?></h3>
		<p><?php echo $expense['amount']; ?>€</p>
		<div class="expense-uheader-w">
			<span>Paguar nga: <?php echo getUser($expense['paid_by'])['full_name']; ?></span>
			<span><?php echo $expense['date']; ?></span>
		</div>
	</div>
	<div class="expense-for">
		<h6>Për <?php echo count(explode(",", $expense['for_whom'])); ?> persona </h6>
		<?php foreach (explode(",", $expense['for_whom']) as $p): ?>
			<div class="expense-for-single">
				<div class="expense-for-single-left"><?php echo explode(" ", getUser($p)['full_name'])[0]; ?> <?php echo (getUser($p)['id'] == $_SESSION['user']['id']) ? '(unë)' : ''; ?></div>
				<div class="expense-for-single-right"><?php echo number_format((float)$amount_per, 2, '.', ''); ?>€</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>