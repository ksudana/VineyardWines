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
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = "SELECT fname, lname FROM users WHERE username='$username' AND password='$password'";
    $result = $con->query($query);
    if($result->num_rows == 0) {
      echo "Invalid Username/Password!";
    }
    else
      printf("Hello %s!", $result->fetch_array(MYSQLI_NUM)[0]);
  }
  ?>
  <body>
    <form action="index.html">
      <input type="submit" value="Back">
    </form>
  </body>
</html>
