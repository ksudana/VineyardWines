<html>
  <?php
  session_start();
    
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
    $query = "SELECT * FROM Users WHERE username='$username' AND password='$password'";
    $result = $con->query($query);
    $row = $result->fetch_assoc();
    if(!$row) {
      echo "Invalid Username/Password!";
    }
    else {
      $_SESSION['uid'] = $row['uid'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['age'] = $row['age'];
      $_SESSION['sex'] = $row['sex'];
      $_SESSION['country'] = $row['country'];

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
