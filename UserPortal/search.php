<?php
		session_start();
		include_once 'nav.php';
		include_once '../db_info.php';
?>
<html>
<title> Discover</title>
<head>

	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <title>VineyardWines</title>

	    <!-- Bootstrap core CSS -->
	    <link href="../Bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	    <!-- Custom styles for this template -->
	    <link href="../Bootstrap/css/shop-item.css" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet">

	    <script src="js/my_js.js"></script>
</head>

<body>

<form action="result.php" method="POST">
<titlec><center><h1>Discover New Tastes</h1></center></titlec>
<center><table>
<tr>
<td><titlec>Search</titlec></td>
<td><titlec>Criteria</titlec></td>
<td><titlec>Order By</titlec></td>
</tr>
<tr>
	<td><input type="text" name="name" placeholder = "Enter Value" size="100"></td>
    <td><select name="search">
        Search:
        <option value="variety">Wine Name</option>
        <option value="country">Country</option>
        <option value="designation">Vineyard</option>
        <option value="winery">Winery</option>
        </select>
    </td>
    <td><select name="order">
        Order By:
        <option value="variety">Wine Name</option>
        <option value="country">Country</option>
        <option value="winery">Winery</option>
        <option value="price_asc">Price (low to high)</option>
        <option value="price_desc">Price (high to low)</option>
        </select>
    </td>
	<td><titlec><input type="submit" value="Search" name="submit"></titlec></td>
</tr>
</center>
</form>
</table>
<tr>
<br>
<br>
<br>
<br>
<br>
</tr>
<tr>
<h2><titlec>Recommended Wines</titlec></h2>
</tr>
<tr>
<titlec>
	<?php
				try {
						$pdo = new PDO("mysql:host=$hn;dbname=$db", $un, $pw);
						$lol = $_SESSION['uid'];
						$sql = "CALL p('$lol')";
						$q = $pdo->query($sql);
						$q->setFetchMode(PDO::FETCH_ASSOC);
				} catch (PDOException $e) {
						die("Error occurred:" . $e->getMessage());
				}
	?>
	<table>
			<?php while ($r = $q->fetch()): ?>
					<tr>
							<td><h3><titlec><?php echo $r['variety'] ?></titlec></h3></td>
					</tr>
			<?php endwhile; ?>
	<?php
        $uid = $_SESSION['uid'];
	    $conn = mysql_connect($hn, $un, $pw);
	    mysql_select_db($db, $conn);
        $sele = "SELECT DISTINCT wid,variety FROM Wines WHERE wid IN (SELECT A.wid FROM (SELECT Favorites.wid AS wid, Favorites.date AS wineDate FROM Follows,Favorites WHERE (Favorites.uid = Follows.uid2) AND (Follows.uid1 = '$uid') UNION SELECT Reviews.wid AS wid, Reviews.date AS wineDate FROM Follows,Reviews WHERE (Reviews.uid = Follows.uid2) AND (Follows.uid1 = '$uid') AND (Reviews.recommend = 1) ORDER BY wineDate) AS A) AND wid NOT IN (SELECT wid FROM Favorites WHERE uid='$uid')";
	    $result = mysql_query($sele);
	    if(!$result) {
	      print("Bad Query");
	    }

	    if(mysql_num_rows($result) > 0){
	      $i = 0;
	      while($row = mysql_fetch_assoc($result) and $i < 10){
	      $wid = $row['wid'];
          $name = $row['variety'];
	      echo "<table><tr><td><titlec><h5><a href= 'Review_Temp.php?wid=" . $wid . "'>". $name ."</h5></titlec></td></tr></table>";
	    }
	  }
   ?>
</titlec>
</tr>
<footer alignclass="py-1 bg-dark">

</footer>

<!-- Bootstrap core JavaScript -->
<script src="../Bootstrap/vendor/jquery/jquery.min.js"></script>
<script src="../Bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
