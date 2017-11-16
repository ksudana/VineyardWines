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
    $rid = $_POST["rid"];
    $wid = $_POST["wid"];
    $title = $_POST["title"];
    $mysqldate = date( 'Y-m-d H:i:s');
    $rating = $_POST["rating"];
    $recommend = $_POST["recommend"];
    $recommend = ($recommend == "Yes") ? 1 : 0;
    $review = $_POST["content"];
    $query = "UPDATE Reviews (uid, wid, title, content, date, rating, recommend) VALUES ('$uid', '$wid', '$title', '$review', '$mysqldate', $rating, $recommend)";
    $result = mysqli_query($con, $query);
    if(!$result) {
        echo "Couldn't update review, might be a bad query!";
    }
    else {
        echo "Updated Review!";
        header("location: editreview.php?rid=$rid");
    }
  }
    mysqli_close($db);
  ?>
</html>
