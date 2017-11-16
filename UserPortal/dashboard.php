<?php
    session_start();
    include_once 'nav.php';
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
    <link href="../Bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../Bootstrap/css/shop-item.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet">


  </head>

<body>
    <!-- Page Content -->
    <div class="container">
    <div class="row">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row">
      <div class="col-md-12 text-center ">
        <div class="panel panel-default">
          <div class="userprofile social ">
            <div class="userpic"> <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="" class="userpicimg"> </div>
            <div class="border border-success" style="background-color:#F0F3F5; width:30%; align:center">
                <h5><?php echo $_SESSION['name']; ?></h5>
                <h5>@<?php echo $_SESSION['username']; ?></h5>
            </div>
          </div>

          <div class="clearfix"></div>
        </div>
      </div>
      <!-- /.col-md-12 -->
      <div class="col-md-5 pull-right">


        <div class="container">
          <div class="text-center">
          <titlec><h4>About You</h4></titlec>
        </div>
    <div class="notice notice-success">
        <strong>Age</strong><?php echo $_SESSION['age']; ?>
    </div>

    <div class="notice notice-warning">
        <strong>Sex</strong><?php echo $_SESSION['sex']; ?>
    </div>
    <div class="notice notice-info">
        <strong>Country</strong><?php echo $_SESSION['country']; ?>
    </div>

</div>

      </div>
      <div class="col-md-5  pull-left posttimeline">
            INSERT REVIEW BOX HERE
      </div>
    </div>
</div>

<div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-1 bg-dark">
      <br><br>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
