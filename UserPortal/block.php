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
    try {
    // First of all, let's begin a transaction
    $db->beginTransaction();

    // A set of queries; if one fails, an exception should be thrown
    $db->query("DELETE FROM Follows WHERE uid1='$my_uid' AND uid2='$foreign_uid'");
    $db->query("DELETE FROM Follows WHERE uid2='$my_uid' AND uid1='$foreign_uid'");
    // If we arrive here, it means that no exception was thrown
    // i.e. no query has failed, and we can commit the transaction
    $db->commit();
} catch (Exception $e) {
    // An exception has been thrown
    // We must rollback the transaction
    $db->rollback();
}

  header("location: otherusers.php?otherid=$foreign_uid");
}
    mysqli_close($db);
  ?>
</html>
