<?php
session_start();
?>
<!DOCTYPE html>
<!--
Micheal Willard
Oregon State University
CS 290-400
Winter 2015
Assignment 4 Part 1
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>PSSBL Adams Pirates - Create Account</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
    <!-- // <script src="js/bootstrap.min.js"></script> -->

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
              echo "<li class='active'><a href='newaccount.php'><span class='glyphicon glyphicon-user'></span> Create Account</a></li>";
            }
            ?>
          </ul>
        </div>
        <!-- </div>/.navbar-collapse -->
      </div>
    </nav>

    <div class="container">
      <form method="post" class="form-signin" id="createAcc">
        <span id="create_results"></span>
        <h2 class="form-signin-heading">Create New Account</h2>
        <div class="form-group">
          <label for="inputUsername">User Name:</label>
            <input type="text" name="inputUsername" id="inputUsername" class="form-control" placeholder="roberto123" required autofocus>
            <span id="username_result"></span>
          </div>
          <div class="form-group">
            <label for="inputPassword">Password:</label>
            <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="password" required>
          </div>
          <div class="form-group">
            <label for="inputFirstname">First Name:</label>
            <input type="text" name="inputFirstname" id="inputFirstname" class="form-control" placeholder="Roberto" required>
          </div>
          <div class="form-group">
            <label for="inputLastname">Last Name:</label>
            <input type="text" name="inputLastname" id="inputLastname" class="form-control" placeholder="Clemente" required>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="login" id="submit">Create</button>
        </form>
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

    <!-- UNIQUE JAVASCRIPT
    =================================================== -->

    <script type="text/javascript">
    $("#inputUsername").keyup(function(event) {
       var username = $(this).val();
       $.post('check_username.php', {'username':username, 'type':'create'}, function(data) {
       $("#username_result").html(data); // check_username.php result
       });
    });

    $(document).ready(function(){
      $("#submit").click(function(){
        var username = $("#inputUsername").val();
        var password = $("#inputPassword").val();
        var first_name = $("#inputFirstname").val();
        var last_name = $("#inputLastname").val();

        var postString = 'username='+ username + '&password='+ password + '&first_name='+ first_name + '&last_name='+ last_name;
        if(username == '' || password == '' || first_name == '' || last_name == '') {
          alert("All Fields are Required");
        }
      else {
          $.ajax({
            type: "POST",
            url: "createAccount.php",
            data: postString,
            cache: false,
            success: function(result){
              alert(result);
              $('#createAcc')[0].reset();
            }
          });
        }
        return false;
      });
    });

    </script>

  </body>
</html>
