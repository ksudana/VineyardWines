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
    $rid = $_POST["rid"];
    $title = $_POST["name"];
    $mysqldate = date( 'Y-m-d H:i:s');
    $rating = $_POST["rating"];
    $recommend = $_POST["Recommend"];
    $recommend = ($recommend == "Yes") ? 1 : 0;
    $review = $_POST["message"];
    $query = "UPDATE Reviews SET title='$title',content='$review',date='$mysqldate',rating='$rating',recommend='$recommend'
    WHERE rid='$rid'";
    $result = mysqli_query($con, $query);
    if(!$result) {
        echo "Bad Query!";
    }
    else {
        echo "Created Review!";
        header("location: dashboard.php");
    }
  }
    mysqli_close($db);
  ?>
</html>