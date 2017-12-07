<?php
	include_once 'nav.php';
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
</head>

<body>

<form action="result.php" method="POST">
<titlec><center><h1>Discover New Tastes</h1></center></titlec>
<center><table>
<tr><titlec>
<td>Search</td>
<td>Criteria:</td>
<td>Order By:</td>
</titlec></tr>
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
</table></center>
</form>
<footer alignclass="py-1 bg-dark">

</footer>

<!-- Bootstrap core JavaScript -->
<script src="../Bootstrap/vendor/jquery/jquery.min.js"></script>
<script src="../Bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
