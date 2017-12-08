<?php 
    session_start();
    include_once '../db_info.php';
?>
<html>
  <?php
  $mysqli = new mysqli(($hn, $un, $pw, $db);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
  else {
    $mysqli->autocommit(FALSE);

    $my_uid = $_SESSION['uid'];
    $foreign_uid = $_POST["foreign_uid"];
    mysqli_query("START TRANSACTION");

    $a1 = $mysqli->query("DELETE FROM Follows WHERE uid1='$my_uid' AND uid2='$foreign_uid'");
    $a2 = $mysqli->query("DELETE FROM Follows WHERE uid2='$my_uid' AND uid1='$foreign_uid'");

  if ($a1 and $a2) {
      $mysqli->commit();
  } else {        
      $mysqli->rollback();
  }
  header("location: otherusers.php?otherid=$foreign_uid");
}
    $mysqli->close;
  ?>
</html>
