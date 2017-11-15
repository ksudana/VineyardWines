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
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $age = $_POST["age"];
    $country = $_POST["country"];
    $sex = $_POST["sex"];
    $query = "INSERT INTO Users (name, username, password, age, country, sex) VALUES ('Karthik', 'ksudana', 'pass', 20, 'US', 'Male')";
    $result = mysqli_query($con, $query);
    echo "Created Account!";
  }
  mysqli_close($con);
  ?>

  <form action="index.html">
    <input type="submit" value="Back">
  </form>
</html>