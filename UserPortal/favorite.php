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
    $query = "SELECT FROM Favorites WHERE uid='$uid' AND wid='$wid'";
    $result = mysqli_query($con, $query);
    if(!$result) {
        echo "Bad Query!";
        print($query);
    }
    else {
        if(mysql_num_rows($result) > 0){
            $query = "DELETE FROM Favorites WHERE uid='$uid' AND wid='$wid'";
        }
        else {
            $mysqldate = date( 'Y-m-d H:i:s');
            $query = "INSERT INTO Favorites (uid, wid, date) VALUES ('$uid','$wid','$mysqldate')";
        }
        $result = mysqli_query($con, $query);
        header("location: Review_Temp.php?wid=$wid");
    }
  }
    mysqli_close($db);
  ?>
</html>
