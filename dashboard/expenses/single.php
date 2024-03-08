<?php 
include 'dbh.php';
$expense = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM expenses WHERE id=". $_GET['c'])); 
$amount = floatval($expense['amount']);
$amount_per = $amount / count(explode(",", $expense['for_whom']));
?>
<div class="expense">
	<div class="expense-header">
		<a href="<?php echo $permalink;?>?t=<?php echo $expense['cek_id']; ?>">Back</a>
	</div>
	<div class="expense-uheader">
		<h3><?php echo $expense['title']; ?></h3>
		<p><?php echo $expense['amount']; ?>€</p>
	</div>
	<div class="expense-for">
		<?php foreach (explode(",", $expense['for_whom']) as $p): ?>
			<div class="expense-for-single">
				<div class="expense-for-single-left"><?php echo explode(" ", getUser($p)['full_name'])[0]; ?> <?php echo (getUser($p)['id'] == $_SESSION['user']['id']) ? '(me)' : ''; ?></div>
				<div class="expense-for-single-right"><?php echo $amount_per; ?>€</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>