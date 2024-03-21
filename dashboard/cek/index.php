<?php 
include 'dbh.php';
$cek = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM events WHERE id=". $_GET['t'])); 
$participantst = "";
foreach (explode(", ", $cek['event_participants']) as $p) {
	$participantst .= getUser($p)['full_name'] . ", ";
}
$participantst = rtrim($participantst, ', ');

$participants = [];
foreach (explode(", ", $cek['event_participants']) as $p) {
	$part = new stdClass();
	$part->id = $p;
	$part->name = getUser($p)['full_name'];
	$part->owes = array();
	array_push($participants, $part);
}
for ($i = 0;$i < count($participants);$i++):
	foreach ($participants as $j=>$participant):
		if ($participants[$i]->id == $participant->id) {
			continue;
		} else {
			$participants[$i]->owes[$participant->id] = 0;
		}
	endforeach;
endfor;

function findElementById($array, $id) {
    foreach ($array as $i=>$element) {
        if ($element->id === $id) {
            return $i;
        }
    }
    return null; 
}
?>
<div class="cek">
	<div class="cek-header">
		<a class="cek-header-left" href="<?php echo $permalink; ?>"><i class="fa-solid fa-angle-left"></i></a>

		<div class="cek-header-right">
			<div class="cek-header-right-name"><?php echo $cek['event_name']; ?> </div>
			<div class="cek-header-right-participants"><?php echo $participantst; ?></div>
		</div>
		<a onclick="$(this).toggleClass('show_balance');jQuery('.cek-body').toggleClass('show_balance');" class="cek-header-expenses"><i class="fa fa-scale-balanced"></i></a>
		<a class="cek-header-tcLink"><i class="fa fa-paperclip"></i></a>
	</div>
	<div class="cek-body">
		<div class="cek-body-expenses">
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
			<?php $amount_pp = $expense['amount'] / count(explode(",", $expense['for_whom']));
			foreach (explode(",", $expense['for_whom']) as $j=>$p) {
				if ($p == $expense['paid_by']) {
					continue;
				}	
				$participants[findElementById($participants, $expense['paid_by'])]->owes[$p] -= $amount_pp;
				$participants[findElementById($participants, $p)]->owes[$expense['paid_by']] += $amount_pp;
			} ?>
			<?php } ?>
		</div>
		<div class="cek-body-balances">
		<?php $d = [];
		foreach ($participants as $i=>$p) {
			foreach ($p->owes as $j=>$o) {
				if (in_array($j, $d)) {
					continue;
				} else {
					echo getUser($j)['full_name'] . " owes " . getUser($p->id)['full_name'] . " " . $o*-1 . "&euro;" . "<br />";
				}
			}
			array_push($d, $p->id);
		} ?>
		</div>
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
