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
    <link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet">
    <link href="css/elements.css" rel="stylesheet">

    <script src="js/my_js.js"></script>

  </head>

<body>
    <!-- Page Content -->
    <?php
        $con = mysqli_connect($hn, $un, $pw, $db);
        if(!$con) {
           echo "Connection failed!";
        }

        $uid = $_SESSION['uid'];
        $query = "SELECT * FROM Users WHERE uid='$uid'";
        $result = $con->query($query);
        $row = $result->fetch_assoc();
        if(!$row) {
          echo "Invalid User!";
        }

        $username = $row['username'];
        $name = $row['name'];
        $age = $row['age'];
        $sex = $row['sex'];
        $country = $row['country'];

        mysql_free_result($result);
        $aggquery = "SELECT COUNT(*) AS num_reviews FROM Reviews WHERE uid='$uid'";
        $result = $con->query($aggquery);
        $row = $result->fetch_assoc();
        if(!$row) {
          echo "Invalid User!";
        }

        $numreviews = $row['num_reviews'];
        mysql_free_result($result);
        mysqli_close($db);
    ?>
    <div class="container">
    <div class="row">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row">
      <div class="col-md-12 text-center ">
        <div class="panel panel-default">
          <div class="userprofile social ">
            <div class="userpic"> <img src="https://static.change.org/profile-img/default-user-profile.svg" alt="" class="userpicimg"> </div>
            <div class="border border-success" style="background-color:#F0F3F5; width:30%; margin:auto; padding-top:10px; margin-top:25px">
                <h5><?php print($name); ?></h5>
                <h5>@<?php print($username); ?></h5>
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
        <strong>Age: </strong> <?php print($age); ?>
    </div>

    <div class="notice notice-warning">
        <strong>Sex: </strong> <?php print($sex); ?>
    </div>
    <div class="notice notice-info">
        <strong>Country: </strong><?php print($country); ?>
    </div>

    <div class="notice notice-danger">
        <strong>Reviews: </strong><?php print($numreviews); ?>
    </div>

</div>

      </div>
      <div class="col-md-8  pull-left posttimeline">
    <div class="card card-outline-secondary my-4">
      <div class="card-header">
        Your Wine Reviews
      </div>
      <div class="card-body">
        <?php
        $conn = mysql_connect($hn, $un, $pw);
        mysql_select_db($db, $conn);
        $sele = "SELECT * FROM Reviews WHERE uid='$uid'";
        $result = mysql_query($sele);
        if(!$result) {
          print("Bad Query");
        }
        if(mysql_num_rows($result) > 0){
          $i = 0;
          while($row = mysql_fetch_assoc($result) and $i < 50){
          $wid = $row['wid'];
          $query2 = "SELECT * FROM Wines WHERE wid='$wid'";
          $result2 = mysql_query($query2);
          $wine_row = mysql_fetch_assoc($result);
          $recommend = $row['reommend'] == 1 ? "Yes" : "No";
          echo "<table><tr><td><titlec><h3><a href= 'Review_Temp.php?wid=" . $wid . "'>". $wine_row['variety'] ."</h3></titlec></td></tr>";
          echo "<table><tr><td><titlec><h5>". $row['title'] ."</h5></titlec></td></tr>";
          echo "<tr><td><titlec> Rating:    ". $row['rating'] / 5 ."</titlec></td></tr>";
          echo "<tr><td><titlec> Recommend: ". $recommend ."</titlec><br></td></tr>";
          echo "<tr><td><titlec><h6>". $row['content'] ."</h6></titlec></td></tr>";

          echo "<tr><td><titlec> <p>Posted on   ". $row['date'] ."</p></titlec></td></tr></table>";
          $rid = $row['rid'];
          $content = $row['content'];
          $i = $i + 1;
          echo "<a href= 'editreview.php?rid=" . $rid . "'><button> EDIT REVIEW </button></a>";
          ?>
          
          <form style="padding:0px; border:none" action="deletereview.php" id="delete_form" method="post" name="delete_form">
            <input id="rid" name="rid" type="hidden" value="<?php print($rid)?>">
            <input id="content" name="content" type="hidden" value="<?php print($content)?>">
            <button type="button" onclick=form.submit()>Delete Your Review</button>
          </form>

          <hr>
          <?php

          }
        }
      mysql_free_result($result);
      mysql_close($conn);
      ?>

        <div id="abc">
        <!-- Popup Div Starts Here -->
        <div id="popupContact">
        <!-- Edit Review Form -->
        <form action="editreview.php" id="edit_form" method="post" name="edit_form">
        <img id="close" src="images/3.png" onclick ="div_hide()">
        <h2>Edit Your Review</h2>
        <hr>
        <?php
            $rid_to_edit = $_SESSION['rid_to_edit'];
            print($rid_to_edit);
        ?>
        <input id="rid" name="rid" type="hidden" value="<?php print($rid_to_edit) ?>">
        <input id="name" name="name" placeholder="Title" type="text">
        <input id="rating" name="rating" placeholder="Rating (Out of 5)" type="number">
        <input id="Recommend" name="Recommend" placeholder="Would You Recommend? (Yes or No) " type="text">
        <textarea id="msg" name="message" placeholder="Review"></textarea>
        <a id="submit" onclick=form.submit()>Save</a>
        </form>
        </div>
        <!-- Popup Div Ends Here -->
        </div>
        <!-- Display Popup Button -->
      </div>
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
