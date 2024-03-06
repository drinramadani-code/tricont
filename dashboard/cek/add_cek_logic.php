<?php
include '../../dbh.php';

$cek_id = mysqli_real_escape_string($conn, $_GET['cek_id']);
$title = mysqli_real_escape_string($conn, $_GET['title']);
$amount = mysqli_real_escape_string($conn, $_GET['amount']);
$date = mysqli_real_escape_string($conn, $_GET['date']);
$paid_by = mysqli_real_escape_string($conn, $_GET['paid_by']);
$for_whom = mysqli_real_escape_string($conn, $_GET['for_who']);
// echo ;
$header_location = $permalink . "?t=$cek_id";
mysqli_query($conn, "INSERT INTO expenses (cek_id, title, amount, date, paid_by, for_whom) VALUES ('$cek_id', '$title', '$amount', '$date', '$paid_by', '$for_whom'); ");
header("Location: $header_location");

?>

<!-- <pre><?php // var_dump($_GET); ?></pre> -->