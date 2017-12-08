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
			<?php while($r = $q->fetch()){
			$wid = $r['wid'];
				$name = $r['variety'];
			echo "<table><tr><td><titlec><h3><a href= 'Review_Temp.php?wid=" . $wid . "'>". $name ."</h3></titlec></td></tr></table>";
		} ?>

</titlec>
</tr>
<footer alignclass="py-1 bg-dark">

</footer>

<!-- Bootstrap core JavaScript -->
<script src="../Bootstrap/vendor/jquery/jquery.min.js"></script>
<script src="../Bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
