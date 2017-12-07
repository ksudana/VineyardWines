<?php
    include_once 'nav.php';
?>
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
    <style>
    	table{
    		border-collapse: collapse;
    		width: 100%;
    		color: #588c7e;
    		font-family: monospace;
    		font-size: 20px;
    		text-align: left;
    	}
    	th{
    		background-color: #588c7e;
    		color: white;
    	}
    	tr:nth-child(even) {background-color: #f2f2f2}
    	h2{
    		background-color: #f0f3f5;
    	}
    </style>
  </head>

  <body>
    <!-- Navigation -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  	<table>
  		<tr>
  			<th>Variety</th>
  			<th>Designation</th>
  			<th>Winery</th>
  			<th>Province</th>
  			<th>Price</th>
  			<th>Country</th>
  		</tr>
  		<?php
		$conn = mysql_connect("localhost", "root", "password");
		mysql_select_db("VineyardWinesDB", $conn);


		if($_REQUEST['submit']){
		$name = $_POST['name'];
        $orderby = $_POST['order'];
		if(empty($name)){
			$make = '<h4>You must type a word to search!</h4>';
		}else{
			$make = '<h4>No match found!</h4>';
            
            $order = "ASC";
            
            else if($orderby == "price_asc") {
                $orderby = "price";
            }
            else if($orderby == "price_desc") {
                $orderby = "PRICE";
                $order = "DESC";
            }
            
			$sele = "SELECT * FROM Wines WHERE variety LIKE '%$name%' ORDER BY '$orderby' '$order'";
			$result = mysql_query($sele);
			if(!$result) {
				print("Bad Query");
			}
			if(mysql_num_rows($result) > 0){

				$i = 0;
				while($row = mysql_fetch_assoc($result) and $i < 50){
				$id = $row['wid'];
				$wineName = $row['variety'];
				echo "<tr><td><a href= 'Review_Temp.php?wid=" . $id . "'>" . $wineName ."</a></td><td>". $row['designation']. "</td><td>" .$row['winery'] ."</td><td>". $row['province'] ."</td><td>" .$row['price'] ."</td><td>". $row['country'] ."</td></tr>";
				$i = $i + 1;

			}
			echo "</table>";
		}else{
		echo'<h2> Search Result</h2>';
		print ($make);
		}
		mysql_free_result($result);
		mysql_close($conn);
		}
		}
		?>
  	</table>
  	    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
      </div>
      <!-- /.container -->
    </footer>
  </body>


</html>
