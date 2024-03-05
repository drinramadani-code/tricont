<?php

  if (!isset($_SESSION)): 
    session_start();
  endif;
  $entrie_options = [5, 10, 25, 50, 100];

  $server_name = "localhost";
  $db_username = "root";
  $db_password = "";
  $db_name = "tricont";

  $conn = mysqli_connect($server_name, $db_username, $db_password, $db_name);

  $sql = "SELECT * FROM options WHERE option_name = 'Permalink'";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    // Access the values in the row
    $option_name = $row['option_name'];
    $option_value = $row['option_value'];
  }
  $permalink = $_SESSION['permalink'] = $option_value;


  if (!$conn){
    die("Connection failed: " .mysqli_connect_error());
  }