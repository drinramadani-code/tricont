<?php
include '../../dbh.php';

$cek_id = mysqli_real_escape_string($conn, $_GET['cek_id']);
$title = mysqli_real_escape_string($conn, $_GET['title']);
$amount = mysqli_real_escape_string($conn, $_GET['amount']);
$date = mysqli_real_escape_string($conn, $_GET['date']);
$paid_by = mysqli_real_escape_string($conn, $_GET['paid_by']);
$for_whom = mysqli_real_escape_string($conn, $_GET['for_who']);
// echo ;
// $title = "palidhje";
$header_location = $permalink . "?t=$cek_id";
mysqli_query($conn, "INSERT INTO expenses (cek_id, title, amount, date, paid_by, for_whom) VALUES ('$cek_id', '$title', '$amount', '$date', '$paid_by', '$for_whom'); ");

// echo $amount . "<br />";
// echo $paid_by . "<br />";
// echo $for_whom . "<br />";

$per = $amount / count(explode(",", $for_whom));
// echo $per;

$e_q = mysqli_query($conn, "SELECT * FROM expenses WHERE cek_id=".$cek_id);
$f_e;
while ($e = mysqli_fetch_assoc($e_q)) {
	$f_e = $e;
}
$expense_id = $f_e['id'];
foreach (explode(",", $for_whom) as $p) {
	if (getUser($p)['id'] == getUser($paid_by)['id']){continue;}
	$owes = getUser($p)['id'];
	$who  = getUser($paid_by)['id'];
	mysqli_query($conn, "INSERT INTO owes (owes, who, total, expense_id) VALUES ($owes, $who, '$per', $expense_id);");
}
header("Location: $header_location");

?>

<!-- <pre><?php // var_dump($_GET); ?></pre> -->