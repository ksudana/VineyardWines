<?php
    include_once 'nav.php';
$conn = mysql_connect("localhost", "root", "password");
mysql_select_db("VineyardWinesDB", $conn);


if($_REQUEST['submit']){
$name = $_POST['name'];
if(empty($name)){
	$make = '<h4>You must type a word to search!</h4>';
}else{
	$make = '<h4>No match found!</h4>';
	$sele = "SELECT * FROM Wines WHERE variety LIKE '%$name%'";
	$result = mysql_query($sele);
	if(!$result) {
		print("Bad Query");
	}

	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_assoc($result)){
		echo '<h4> Variety					: '.$row['variety'];
		echo '<br> Designation						: '.$row['designation'];
		echo '</h4>';
	}
}else{
echo'<h2> Search Result</h2>';
print ($make);
}
mysql_free_result($result);
mysql_close($conn);
}
}
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop Item - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="../Bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../Bootstrap/css/shop-item.css" rel="stylesheet">
    <link href="css/elements.css" rel="stylesheet">

    <script src="js/my_js.js"></script>
  </head>
  </html>
?>
