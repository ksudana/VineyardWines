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
    $query = "INSERT INTO Users (name, username, password, age, country, sex) VALUES ('$name', '$username', '$password', '$age', '$country', '$sex')";
    $result = $con->query($query);
    $query1 = "SELECT * FROM Wines WHERE wid=1"
    $result1 = $con->query($query);
    echo $result1;
    echo $name;
    echo "Created Account!";
  }
  ?>

  <form action="index.html">
    <input type="submit" value="Back">
  </form>
</html>