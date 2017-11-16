<?php 
    session_start();
    include_once '../db_info.php';
?>
<html>
  <?php
  $con = mysqli_connect($hn, $un, $pw, $db);
  if(!$con) {
    echo "Connection failed!";
  }
  else {
    $uid = $_SESSION['uid'];
    $wid = $_POST["wid"];
    $title = $_POST["name"];
    $mysqldate = date( 'Y-m-d H:i:s');
    $rating = $_POST["rating"];
    $recommend = $_POST["Recommend"];
    $recommend = ($recommend == "Yes") ? 1 : 0;
    $review = $_POST["message"];
    $query = "INSERT INTO Reviews (uid, wid, title, content, date, rating, recommend) VALUES ('$uid', '$wid', '$title', '$review', '$mysqldate', $rating, $recommend)";
    $result = mysqli_query($con, $query);
    if(!$result) {
        echo "Bad Query!";
    }
    else {
        echo "Created Review!";
        header("location: Review_Temp.php?wid=$wid");
    }
  }
    mysqli_close($db);
  ?>
</html>
