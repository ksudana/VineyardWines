<?php
    include_once 'nav.php';
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop Item - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="../Bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../Bootstrap/css/shop-item.css" rel="stylesheet">
    <link href="css/elements.css" rel="stylesheet">

    <script src="js/my_js.js"></script>
  </head>

  <body>

    <!-- Navigation -->


    <!-- Page Content -->
    <div class="container">

      <div class="row">


        <div class="col-md-5">

          <div class="card mt-4">
            <div class="card-body">
              <h3 class="card-title">Product Name</h3>
              <h4>$24.99</h4>
              <p class="card-text">
                <div class = "designation">
                Designation: ASIOJDOIDJ <br/> <br/>
                </div>
                <div class = "Critic Rating">
                Critic Rating: N/A <br/> <br/>
                </div>
                <div class = "Price">
                Price: $$ <br/> <br/>
                </div>
                <div class = "Province">
                Province: California <br/> <br/>
                </div>
                <div class = "Region1">
                Region 1: Idk <br/> <br/>
                </div>
                <div class = "Region2">
                Region 2: Idk2 <br/> <br/>
              </div>
              <div class = "Winery">
                Winery: Some Winery <br/> <br/>
                Description: This tremendous 100% varietal wine hails from Oakville and was aged over three years in oak. Juicy red-cherry fruit and a compelling hint of caramel greet the palate, framed by elegant, fine tannins and a subtle minty tone in the background. Balanced and rewarding from start to finish, it has years ahead of it to develop further nuance. Enjoy 2022Š—–2030. <br/> <br/>
                Country: US <br/> <br/>
              </div>
              </p>
              <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
              4.0 stars
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

              $sele = "SELECT * FROM Reviews ";
              $result = mysql_query($sele);
              if(!$result) {
                print("Bad Query");
              }
              if(mysql_num_rows($result) > 0){
                $i = 0;
                while($row = mysql_fetch_assoc($result) and $i < 50){
                echo "<table><tr><td>". $row['uid'] ."</td></tr>";
                echo "<tr><td>". $row['wid'] ."</td></tr>";
                echo "<tr><td>". $row['title'] ."</td></tr>";
                echo "<tr><td>". $row['content'] ."</td></tr>";
                echo "<tr><td>". $row['date'] ."</td></tr>";
                echo "<tr><td>". $row['rating'] ."</td></tr>";
                echo "<tr><td>". $row['recommend'] ."</td></tr></table><hr>";
                $i = $i + 1;
                }
              }
            mysql_free_result($result);
            mysql_close($conn);
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
