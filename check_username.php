<?php
include 'storedInfo.php';
// Micheal Willard
// Oregon State University
// CS 290-400
// Winter 2015
// Final Project
// "oniddb.cws.oregonstate.edu","willardm-db",$myPassword

$connectDB = mysqli_connect("oniddb.cws.oregonstate.edu","willardm-db",$myPassword, "willardm-db") or die('Database connection failed.');


if(isset($_POST["username"])) {
    //check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }
    $username =  strtolower(trim($_POST["username"]));
    $username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);

    $results = mysqli_query($connectDB,"SELECT id FROM userAccounts WHERE username='$username'");
    // # of times username occurs: 1 or 0
    $username_exists = mysqli_num_rows($results); //total records
    if($_POST['type'] === 'create') {
      if($username_exists) {
        echo "<span class='glyphicon glyphicon-alert'></span> This username is Taken";
      }else{
        echo "<span class='glyphicon glyphicon-ok'></span> This username is Available";
      }
    }
    if($_POST['type'] === 'login') {
      if($username_exists) {
        echo "<span class='glyphicon glyphicon-ok'></span> This username is legit.";
      }else{
        echo "<span class='glyphicon glyphicon-alert'></span> This username doesn't exist.";
      }
    }
    mysqli_close($connectDB);
}
?>
