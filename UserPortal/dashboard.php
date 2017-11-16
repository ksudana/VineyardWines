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
    <link href="css/elements.css" rel="stylesheet">

    <script src="js/my_js.js"></script>

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
            <div class="border border-success" style="background-color:#F0F3F5; width:30%; margin:auto; padding-top:10px; margin-top:25px">
                <h5><?php echo $_SESSION['name']; ?></h5>
                <h5>@<?php echo $_SESSION['username']; ?></h5>
            </div>
          </div>

          <div class="clearfix"></div>
        </div>
      </div>
      <!-- /.col-md-12 -->
      <div class="col-md-4 pull-right">


        <div class="container">
          <div class="text-center">
          <titlec><h4>About You</h4></titlec>
        </div>
    <div class="notice notice-success">
        <strong>Age: </strong> <?php echo $_SESSION['age']; ?>
    </div>

    <div class="notice notice-warning">
        <strong>Sex: </strong> <?php echo $_SESSION['sex']; ?>
    </div>
    <div class="notice notice-info">
        <strong>Country: </strong><?php echo $_SESSION['country']; ?>
    </div>

</div>

      </div>
      <div class="col-md-8  pull-left posttimeline">
    <div class="card card-outline-secondary my-4">
      <div class="card-header">
        Product Reviews
      </div>
      <div class="card-body">
        <button id="popup" onclick="div_show()">Add a Review</button>
        <hr>
        <?php
      $conn = mysql_connect("localhost", "root", "password");
      mysql_select_db("VineyardWinesDB", $conn);

        $sele = "SELECT * FROM Reviews ";
        $result = mysql_query($sele);
        if(!$result) {
          print("Bad Query");
        }
        if(mysql_num_rows($result) > 0){
          $i = 0;
          while($row = mysql_fetch_assoc($result) and $i < 50){
          echo "<table><tr<td><titlec><h3>". $row['title'] ."</h3></titlec></td></tr>";
          echo "<tr><td><titlec> Rating:    ". $row['rating'] ."</titlec></td></tr>";
          echo "<tr><td><titlec> Recommend: ". $row['recommend'] ."</titlec><br></td></tr>";
          echo "<tr><td><titlec><h6>". $row['content'] ."</h6></titlec></td></tr>";

          echo "<tr><td><titlec> <p>Posted on   ". $row['date'] ."</p></titlec></td></tr></table><hr>";
          $i = $i + 1;
          ?>
          <div id="abc">
            <!-- Popup Div Starts Here -->
            <div id="popupContact">
            <!-- Contact Us Form -->
            <form action="#" id="form" method="post" name="form">
            <img id="close" src="images/3.png" onclick ="div_hide()">
            <h2>Add Your Review</h2>
            <hr>
            <input id="name" name="name" placeholder="Name" type="text">
            <input id="rating" name="rating" placeholder="Rating (Out of 5)" type="text">
            <input id="Recommend" name="Recommend" placeholder="Would You Recommend? (Yes or No) " type="text">
            <textarea id="msg" name="message" placeholder="Review"></textarea>
            <a href="javascript:%20check_empty()" id="submit">Send</a>
            </form>
            </div>
            <!-- Popup Div Ends Here -->
            </div>
            <!-- Display Popup Button -->
          </div>
          <?
          }
        }
      mysql_free_result($result);
      mysql_close($conn);
      ?>

        
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
    <script src="../Bootstrap/vendor/jquery/jquery.min.js"></script>
    <script src="../Bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
