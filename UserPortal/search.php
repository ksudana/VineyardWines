<?php
//Step1
 $db = mysqli_connect('localhost','root','password','VineyardWinesDB')
 or die('Error connecting to MySQL server.');
?>

<html>
 <head>
 </head>
 <body>
 <h1>PHP connect to MySQL</h1>

<?php
//Step2
$query = "SELECT * FROM `Wines`";
mysqli_query($db, $query) or die('Error querying database.');

//Step3
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

while ($row = mysqli_fetch_array($result)) {
 echo $row['variety'] . ' ' . $row['designation'] . ': ' . $row['points'] . ' ' . $row['price'] .'<br />';
}
//Step 4
mysqli_close($db);
?>

</body>
</html>
