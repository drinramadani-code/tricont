<?php 
include 'dbh.php';
$cek = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM events WHERE id=". $_GET['b'])); 

$participants = [];
foreach (explode(", ", $cek['event_participants']) as $p) {
	$part = new stdClass();
	$part->id = $p;
	$part->name = getUser($p)['full_name'];
	$part->owes = array();
	array_push($participants, $part);
}

?>


<?php 

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

$q = mysqli_query($conn, "SELECT * FROM expenses WHERE cek_id=".$_GET['b']);
while ($expense = mysqli_fetch_assoc($q)) {
	$amount_pp = $expense['amount'] / count(explode(",", $expense['for_whom']));
	foreach (explode(",", $expense['for_whom']) as $j=>$p) {
		if ($p == $expense['paid_by']) {
			continue;
		}	
		$participants[findElementById($participants, $expense['paid_by'])]->owes[$p] -= $amount_pp;
		$participants[findElementById($participants, $p)]->owes[$expense['paid_by']] += $amount_pp;
	}
}


	
?>

<?php 
?>
<div class="cek">
	<div class="cek-header">
		<a class="cek-header-left" href="<?php echo $permalink; ?>"><i class="fa-solid fa-angle-left"></i></a>

		<div class="cek-header-right">
			<div class="cek-header-right-name"><?php echo $cek['event_name']; ?> </div>
			<div class="cek-header-right-participants"><?php echo $participantst; ?></div>
		</div>
		<a href="<?php echo $permalink; ?>?b=<?php echo $_GET['b']; ?>" class="cek-header-expenses">e</a>
		<a href="<?php echo $permalink; ?>?b=<?php echo $_GET['b']; ?>" class="cek-header-expenses">j</a>
	</div>
	<div class="cek-body">
		<?php 
			$d = [];
			foreach ($participants as $i=>$p) {
				foreach ($p->owes as $j=>$o) {
					if (in_array($j, $d)) {
						continue;
					} else {
						echo getUser($j)['full_name'] . " owes " . getUser($p->id)['full_name'] . " " . $o*-1 . "&euro;" . "<br />";
					}
				}
				array_push($d, $p->id);
			}
		?>
	</div>
	<div class="cek-footer">
		<div class="cek-footer-my-total">
			<p class="cek-footer-my-total-gray">My Total</p>
			<span class="cek-footer-my-total-amount"><?php echo number_format((float)$my_total, 2, '.', ''); ?>€</span>
		</div>
		<div class="cek-footer-plus"><a href="<?php echo $_SESSION['permalink']; ?>?t=<?php echo $_GET['b']; ?>&a">+</a></div>
		<div class="cek-footer-total-expenses">
			<p class="cek-footer-total-expenses-gray">TOTAL EXPENSES</p>
			<span class="cek-footer-total-expenses-amount"><?php echo number_format((float)$total_expenses, 2, '.', ''); ?>€</span>
		</div>
	</div>
</div>
