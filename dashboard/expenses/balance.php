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

echo "<pre>";
var_dump($participants);
echo "</pre>";

$q = mysqli_query($conn, "SELECT * FROM expenses WHERE cek_id=".$_GET['b']);
while ($expense = mysqli_fetch_assoc($q)) {
	// $paid_by
	


	// foreach ($participants as $i=>$participant):
	// 	if (intval($expense['paid_by']) == $participant->id) {
	// 		echo "This user paid";

	// 	} else {
	// 		echo getUser(intval($expense['paid_by']))['full_name'] . " paid for it";
	// 	}
	// 	echo "<br />";
	// 	break;
	// endforeach; 
}
	
?>