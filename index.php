<?php
    session_start();
    if(isset($_SESSION['uid'])) {
        header('location: UserPortal/dashboard.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VineyardWines</title>

    <!-- Bootstrap core CSS -->
    <link href="./Bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./Bootstrap/css/shop-item.css" rel="stylesheet">

  </head>

  <body>
    <!-- Page Content -->
    <div class="container">
    
    <br><br>
    <img src="Images/logo.png" style="display:block; margin-left:auto; margin-right:auto"/>
    <br>
    <div class="container">
      <form class="form-signin" action="login.php" method="post">
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password"  name="password" class="form-control" placeholder="Password" required>
        <br>
        <button class="btn btn-lg btn-success btn-block" type="submit">Login</button>
      </form>

    <br>
    <a href="./newuser.html" style="display:flex;justify-content:center;align-items:center">Create Account</a>
    </div> <!-- /container -->
    
    <br><br>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="./Bootstrap/vendor/jquery/jquery.min.js"></script>
    <script src="./Bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
