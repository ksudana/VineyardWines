<?php
    session_start();
    include_once 'nav.php';
    include_once '../db_info.php';
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
    <link href="css/elements.css" rel="stylesheet">

    <script src="js/my_js.js"></script>
  </head>

  <body>

    <?php
       $conn = mysql_connect($hn, $un, $pw);
       mysql_select_db($db, $conn);
       $uid = $_SESSION['uid'];
       $rid = $_GET["rid"];
       $query = "SELECT * FROM Reviews WHERE rid='$rid'";
       $result = mysql_query($query);
       if(!$result) {
           print("Bad Query.");
       }

       $row = mysql_fetch_assoc($result);
       $wid = $row['wid'];
       $title = $row['title'];
       $content = $row['content'];
       $rating = $row['rating'];
       $recommend = $row['recommend'];
       mysql_free_result($result);
       mysql_close($conn);
    ?>


    <!-- Page Content -->
    <div class="container">

      <div class="row">


        <div class="col-lg-7">

          <div class="card mt-4">
            <div class="card-body">
              <p class="card-text">
                <strong> Review Title:</strong>
                <?php
                echo "<table><tr><td><titlec><h3> Review Title: ". $title ."</h3></titlec></td></tr>";
                echo "<tr><td><titlec> Review Comments: ". $content ."</titlec><br></td></tr>";
                echo "<tr><td><titlec><h6> Review Ratings: ". $rating ."</h6></titlec></td></tr>";
                echo "<tr><td><titlec> <p>Review Recommendation: ". $recommend ."</p></titlec></td></tr></table>";
                ?>
              </p>
            </div>
          </div>
          <!-- /.card -->
            </div>

        <!-- /.col-lg-9 -->

      </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../Bootstrap/vendor/jquery/jquery.min.js"></script>
    <script src="../Bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
