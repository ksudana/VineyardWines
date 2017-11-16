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
    $content = $_POST["content"];
    $query = "UPDATE Reviews SET title = '$title', date = '$mysqldate', rating = '$rating', content = '$content', recommend = '$recommend' WHERE rid ='$rid', uid ='$uid'";
    $result = mysqli_query($con, $query);
    if(!$result) {
      print($uid);
      print($rid);
      print($wid);
      print($title);
      print($mysqldate);
      print($recommend);
      print($content);
        echo "Couldn't update review, might be a bad query!";
    }
    else {
        echo "<h1>Updated Review!</h1>";
        header("location: editreview.php?rid=$rid");
    }
  }
    mysqli_close($db);
  ?>
</html>
