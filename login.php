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
    $query = "SELECT uid FROM Users WHERE username='$username' AND password='$password'";
    $result = $con->query($query);
    if(!$row = $result->fetch_assoc()) {
      echo "Invalid Username/Password!";
    }
    else {
      $_SESSION['uid'] = $row['uid'];
      $_SESSION['username'] = $row['username'];
      echo "Successful login!";
      header('location: UserPortal/dashboard.php');
    }
  }
  ?>
  <body>
    <form action="index.php">
      <input type="submit" value="Back">
    </form>
  </body>
</html>
