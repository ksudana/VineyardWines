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
    $following = $_POST["following"];
    $query = "";
    if($following)
        $query = "DELETE FROM Follows WHERE uid1='$my_uid' AND uid2='$foreign_uid'";
    else {
        $mysqldate = date( 'Y-m-d H:i:s');
        $query = "INSERT INTO Follows (uid1, uid2, date) VALUES ('$my_uid','$foreign_uid','$mysqldate')";
    }
    
    $result = mysqli_query($con, $query);
    if(!$result)
        print("Bad Query!");
    else
        header("location: otherusers.php?otherid=$foreign_uid");
  }
    mysqli_close($db);
  ?>
</html>
