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
    $all_users_q = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'; ");
    $user = $_SESSION['user'] = mysqli_fetch_assoc($all_users_q);
} else {
    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'; ");
    if (mysqli_num_rows($query) > 0) {
        $user = $_SESSION['user'] = mysqli_fetch_assoc($query);
        $authed = $_SESSION['authed'] = true;
        echo "<pre>";var_dump($user);echo"</pre>";
    } else {
        echo "Nein";
    }
}


?>