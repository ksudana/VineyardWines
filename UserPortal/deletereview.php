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
    $query = "DELETE FROM Reviews WHERE uid='$uid' AND wid='$wid'";
    $result = mysqli_query($con, $query);
    if(!$result) {
        echo "Bad Query!";
    }
    else {
        echo "Deleted Review!";
        header("location: dashboard.php");
    }
  }
  mysqli_close($db);
  ?>
</html>