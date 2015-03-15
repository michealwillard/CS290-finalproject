<?php
include 'storedInfo.php';
// Micheal Willard
// Oregon State University
// CS 290-400
// Winter 2015
// Final Project

$connectDB = mysql_connect("oniddb.cws.oregonstate.edu","willardm-db",$myPassword) or die("Failed to connect to MySQL");

mysql_select_db("willardm-db",$connectDB) or die("Failed to connect to database");

function Login() {
  session_start(); //starting the session for user profile page
  if(!empty($_POST['inputUsername'])) {
    $query = mysql_query("SELECT * FROM userAccounts WHERE username = '$_POST[inputUsername]' AND password = '$_POST[inputPassword]'") or die(mysql_error());
    $row = mysql_fetch_array($query);
    if(!empty($row['username']) AND !empty($row['password'])) {
      $_SESSION['username'] = $row['username'];
      $_SESSION['firstname'] = $row['firstname'];
      $_SESSION['lastname'] = $row['lastname'];
      $_SESSION['sessionActive'] = true;
      $filePath = explode('/', $_SERVER['PHP_SELF'], -1);
      $filePath = implode('/', $filePath);
      $redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
      // echo "Login successful";
      header("Location: {$redirect}/index.php");
      exit();
    }
    else {
      header("Location: login.php?error=no_user_pass_combo");
    }
  }
  else {
    header("Location: login.php?error=blank"); // Append error message
  }
}

if(isset($_POST['submit'])) {
  Login();
}

?>
