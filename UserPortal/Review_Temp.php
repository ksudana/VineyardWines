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
    <link href="css/elements.css" rel="stylesheet">

    <script src="js/my_js.js"></script>
  </head>

  <body>

    <?php
       $conn = mysql_connect("localhost", "root", "password");
       mysql_select_db("VineyardWinesDB", $conn);
       $uid = $_SESSION['uid'];
       $wid = $_GET["wid"];
       $query = "SELECT * FROM Wines WHERE wid='$wid'";
       $result = mysql_query($query);
       if(!$result) {
           print("Bad Query.");
       }
      
       $row = mysql_fetch_assoc($result);
       $name = $row['variety'];
       $designation = $row['designation'];
       $price = $row['price'];
       $critic_rating = $row['points'];
       $province = $row['province'];
       $region1 = $row['region1'];
       $region2 = $row['region2'];
       $description = $row['description'];
       $country = $row['country'];
       $winery = $row['winery'];
      
       mysql_free_result($result);
       mysql_close($conn); 
    ?>


    <!-- Page Content -->
    <div class="container">

      <div class="row">


        <div class="col-md-5">

          <div class="card mt-4">
            <div class="card-body">
              <h3 class="card-title"><?php print($name); ?></h3>
              <h4>$<?php print($price); ?></h4>
              <p class="card-text">
                <div class = "designation">
                Designation: <?php print($designation); ?> <br/> <br/>
                </div>
                <div class = "Critic Rating">
                Critic Rating: <?php print($critic_rating); ?> <br/> <br/>
                </div>
                <div class = "Province">
                Province: <?php print($province); ?> <br/> <br/>
                </div>
                <div class = "Region1">
                Region 1: <?php print($region1); ?> <br/> <br/>
                </div>
                <div class = "Region2">
                Region 2: <?php print($region2); ?> <br/> <br/>
              </div>
              <div class = "Winery">
                Winery: <?php print($winery); ?> <br/> <br/>
                Description: <?php print($description); ?> <br/> <br/>
                Country: <?php print($country); ?> <br/> <br/>
              </div>
              </p>
            </div>
          </div>
          <!-- /.card -->
            </div>
            <div class="col-md-7">
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
              $sele = "SELECT * FROM Reviews WHERE wid='$wid'";
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
                }
              }
            mysql_free_result($result);
            mysql_close($conn);
            ?>

              <div id="abc">
              <!-- Popup Div Starts Here -->
              <div id="popupContact">
              <!-- Add Review Form -->
              <form action="addreview.php" id="form" method="post" name="form">
                  <img id="close" src="images/3.png" onclick ="div_hide()">
                  <h2>Add Your Review</h2>
                  <hr>
                  <input id="wid" name="wid" type="hidden" value="<?php print($wid)?>">
                  <input id="name" name="name" placeholder="Title" type="text">
                  <input id="rating" name="rating" placeholder="Rating (Out of 5)" type="number">
                  <input id="Recommend" name="Recommend" placeholder="Would You Recommend? (Yes or No) " type="text">
                  <textarea id="msg" name="message" placeholder="Review"></textarea>
                  <a id="submit" onclick="form.submit()">Create Review</a>
              </form>
              </div>
              <!-- Popup Div Ends Here -->
              </div>
              <!-- Display Popup Button -->
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