<?php include '../dbh.php'; ?>
<?php

$event_name = $_GET['event_name'];
$event_leader = $_GET['event_leader'];

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

$sk = password_hash($event_leader . " " . $event_leader, PASSWORD_DEFAULT);
// echo $sk;

mysqli_query($conn, "INSERT INTO events (event_name, event_participants, event_leader, event_sk) VALUES ('$event_name', '$event_leader', '$event_leader', '$sk');");
header("Location: /tricont");