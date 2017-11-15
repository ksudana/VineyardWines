<html>
  <?php
  $hn = "localhost";
  $un = "root";
  $pw = "password";
  $db = "VineyardWinesDB";

  $con = mysqli_connect($hn, $un, $pw, $db);
  if(!$con) {
    echo "Connection failed!";
  }
  else {
    $query = "SELECT UNIQUE variety FROM Wines";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
    while ($row = mysqli_fetch_array($result)) {
        echo $row['first_name'] . ' ' . $row['last_name'] . ': ' . $row['email'] . ' ' . $row['city'] .'<br />';
    }
    mysqli_close($db);
  ?>

  <form action="index.html">
    <input type="submit" value="Back">
  </form>
</html>