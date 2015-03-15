<?php
session_start();
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

    <title>PSSBL Adams Pirates</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <script src="http://maps.googleapis.com/maps/api/js">
    </script>
    <!-- 47.555948, -122.285735 -->

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
            <li class="active"><a href="index.php">Adams Pirates</a></li>
            <li><a href="roster.php">Roster</a></li>
            <li><a href="schedule.php">Schedule</a></li>
            <li><a href="messageboard.php">Message Board</a></li>
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

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>
        <?php
        if(isset($_SESSION['sessionActive'])) {
          echo "Welcome back, " . $_SESSION['firstname'];
        }
        else {
          echo "Welcome to the Home of the Adams Pirates.";
        }
        ?>
        </h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="alert alert-warning" role="alert">
            <h2>Upcoming Practices and Games</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Practice</h2>
          <div id="googleMap" style="height:200px;width=200px"></div>

          <ul class="list-group">
            <li class="list-group-item"><b>Date: 3/14/2015</b></li>
            <li class="list-group-item"><b>Time: 10:00AM</b></li>
            <li class="list-group-item"><b>Location: The K-Center</b></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h2>Practice</h2>
          <div id="googleMap2" style="height:200px;width=200px"></div>

          <ul class="list-group">
            <li class="list-group-item"><b>Date: 3/14/2015</b></li>
            <li class="list-group-item"><b>Time: 10:00AM</b></li>
            <li class="list-group-item"><b>Location: The K-Center</b></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h2>Practice</h2>
          <div id="googleMap2" style="height:200px;width=200px"></div>

          <ul class="list-group">
            <li class="list-group-item"><b>Date: 3/14/2015</b></li>
            <li class="list-group-item"><b>Time: 10:00AM</b></li>
            <li class="list-group-item"><b>Location: The K-Center</b></li>
          </ul>
        </div>
      </div>
      <hr>
    </div> <!-- /container -->

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

    <script>
    // Location could be pulled with Ajax script from server with schedule
    var myCenter=new google.maps.LatLng(47.555948, -122.285735);
    var myCenter2=new google.maps.LatLng(47.555948, -122.285735);

    function initialize()
    {
      var mapProp = {
        center:myCenter,
        zoom:11,
        mapTypeId:google.maps.MapTypeId.ROADMAP
      };
      var mapProp2 = {
        center:myCenter2,
        zoom:11,
        mapTypeId:google.maps.MapTypeId.ROADMAP
      };

      var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
      var map2=new google.maps.Map(document.getElementById("googleMap2"),mapProp2);

      var marker=new google.maps.Marker({
        position:myCenter,
      });
      marker.setMap(map);

      var marker2=new google.maps.Marker({
        position:myCenter2,
      });
      marker2.setMap(map2);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    </script>

  </body>
</html>
