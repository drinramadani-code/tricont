<?php include '../dbh.php'; ?>
<?php 
$username = mysqli_real_escape_string($conn, $_POST['username']); 
$password = mysqli_real_escape_string($conn, $_POST['password']);
if ($_POST['form'] == "signup"): 
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
endif; 

if ($_POST['form'] == "signup") {
    mysqli_query($conn, "INSERT INTO users(full_name, email, username, password) VALUES ('$full_name', '$email', '$username', '$password'); ");
    $authed = $_SESSION['authed'] = true;
} else {
    $authed = $_SESSION['authed'] = true;
}


?>