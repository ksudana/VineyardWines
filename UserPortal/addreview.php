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
    #Prepared Statement
    $stmt = $con->prepare("INSERT INTO Reviews (uid, wid, title, content, date, rating, recommend) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $uid, $wid, $title, $review, $mysqldate, $rating, $recommend);
    $uid = $_SESSION['uid'];
    $wid = $_POST["wid"];
    $title = $_POST["name"];
    $mysqldate = date( 'Y-m-d H:i:s');
    $rating = $_POST["rating"];
    $recommend = $_POST["Recommend"];
    $recommend = ($recommend == "Yes") ? 1 : 0;
    $review = $_POST["message"];
    $stmt->execute();
    $stmt->close();
    header("location: Review_Temp.php?wid=$wid");
  }
    mysqli_close($db);
  ?>
</html>
