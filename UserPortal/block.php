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
    $my_uid = $_SESSION['uid'];
    $foreign_uid = $_POST["foreign_uid"];
    mysql_query("START TRANSACTION");

    $a1 = mysqli_query("DELETE FROM Follows WHERE uid1='$my_uid' AND uid2='$foreign_uid'");
    $a2 = mysqli_query("DELETE FROM Follows WHERE uid2='$my_uid' AND uid1='$foreign_uid'");

  if ($a1 and $a2) {
      mysqli_query("COMMIT");
  } else {        
      mysqli_query("ROLLBACK");
  }
  header("location: otherusers.php?otherid=$foreign_uid");
}
    mysqli_close($db);
  ?>
</html>
