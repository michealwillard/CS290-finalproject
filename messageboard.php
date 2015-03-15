<?php
session_start();
include 'storedInfo.php';
?>
<!DOCTYPE html>
<!--
Micheal Willard
Oregon State University
CS 290-400
Winter 2015
Final Project
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>PSSBL Adams Pirates - Message Board</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/jumbotron.css" rel="stylesheet">
  <link href="css/sticky-footer-navbar.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="js/ie-emulation-modes-warning.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php"><img src="images/logo.gif" width="75px" height="30px"></a>
      </div>
      <!-- <div id="navbar" class="navbar-collapse collapse"> -->
      <div>
        <ul class="nav navbar-nav">
          <li><a href="index.php">Adams Pirates</a></li>
          <li><a href="roster.php">Roster</a></li>
          <li><a href="schedule.php">Schedule</a></li>
          <li class="active"><a href="messageboard.php">Message Board</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php
          if(isset($_SESSION['sessionActive'])) {
            echo "<li><a href='profile.php'><font color='#FDB829'>$_SESSION[firstname] $_SESSION[lastname]</font></a></li>";
            echo "<li><a href='logoutAction.php?action=end'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
          }
          else {
            echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
            echo "<li><a href='newaccount.php'><span class='glyphicon glyphicon-user'></span> Create Account</a></li>";
          }
          ?>
        </ul>
      </div>
      <!-- </div>/.navbar-collapse -->
    </div>
  </nav>

  <div class="container">
    <h2>The Dugout</h2>
    <!-- CREATE THE TABLE -->
    <table class="table table-striped">
      <tbody>
        <?php
        $mysqli = new mysqli("oniddb.cws.oregonstate.edu", "willardm-db", $myPassword, "willardm-db");

        if (!$mysqli || $mysqli->connect_errno){
          echo "Connnection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
        }

        $queryStmt = "SELECT id, name, message, ts FROM messageBoard";
        $tableOut = $mysqli->query($queryStmt);

        if ($tableOut->num_rows > 0){
          while ($row = $tableOut->fetch_row()) {
            echo "<tr><td>" . $row[0] .
            "</td><td>" . $row[1] .
            "</td><td>". $row[2] .
            "</td><td>". $row[3] .
            "</td></tr>";
          }
        }
        else{
          echo "The Message Board is empty.";
        }
        ?>
      </tbody>
    </table>
  </div> <!-- /container -->

  <div class='container'>
    <?php
    if(isset($_SESSION['sessionActive'])) {
      echo "
      <h4>Add to the conversation ...</h4>
      <h5>255 Characters Max:</h5>
      <form method='post' action='addComment.php' id='addComment' class='form-inline' role='form'>
        <div class='form-group'>
          <textarea id='comment' name='comment' rows='4' cols='60' placeholder='Add a comment' maxlength='255' required></textarea>
        </div>
        <button type='submit' class='btn btn-default'>Submit</button>
      </form>";
    }
    else {
      echo "<h4>Login to Add to the conversation.</h4>";
    }

    ?>
  </div>


  <footer class="footer">
    <div class="container">
      <div class="col-xs-6">
        <p class="text-muted">&copy; Micheal Willard 2014</p>
      </div>
      <div class="col-xs-6">
        <p class="text-muted"><a href="https://pssbl.com/t/646/summer/2015/adams/pirates">PSSBL Adams Pirates</a></p>
      </div>
    </div>
  </footer>


  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="js/ie10-viewport-bug-workaround.js"></script>

  <!-- UNIQUE JAVASCRIPT
  =================================================== -->


</body>
</html>
