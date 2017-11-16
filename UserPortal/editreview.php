<?php
    session_start();
    include_once '../db_info.php';
?>
<html>
  <?php
  $con = mysqli_connect($hn, $un, $pw, $db);
  $sele = "SELECT * FROM Reviews WHERE uid='$uid'";
  $result = mysql_query($sele);
  if(!$result) {
    print("Bad Query");
  }
  if(mysql_num_rows($result) > 0){
    $i = 0;
    while($row = mysql_fetch_assoc($result) and $i < 50){
    echo "<table><tr<td><titlec><h3>". $row['title'] ."</h3></titlec></td></tr>";
    echo "<tr><td><titlec> Rating:    ". $row['rating'] ."</titlec></td></tr>";
    echo "<tr><td><titlec> Recommend: ". $row['recommend'] ."</titlec><br></td></tr>";
    echo "<tr><td><titlec><h6>". $row['content'] ."</h6></titlec></td></tr>";
    echo "<tr><td><titlec><h6> review id". $row['rid'] ."</h6></titlec></td></tr>";
    echo "<tr><td><titlec> <p>Posted on   ". $row['date'] ."</p></titlec></td></tr></table>";
    $rid = $row['rid'];
    $content = $row['content'];
    $i = $i + 1}
  }
  if(!$con) {
    echo "Connection failed!";
  }
  else {
    $rid = $_POST["rid"];
    $title = $_POST["name"];
    $rating = $_POST["rating"];
    $recommend = $_POST["Recommend"];
    $recommend = ($recommend == "Yes") ? 1 : 0;
    $review = $_POST["message"];
    $query = "UPDATE Reviews SET title='$title',content='$review',rating='$rating',recommend='$recommend'
    WHERE rid='$rid'";
    $result = mysqli_query($con, $query);
    if(!$result) {
        echo "Bad Query!";
    }
    else {
        echo "Updated Review!";
        header("location: dashboard.php");
    }
  }
    mysqli_close($db);
  ?>
</html>
