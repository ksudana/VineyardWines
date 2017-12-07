<?php
require("./_connect.php");

//connect to db
$db = new mysqli($db_host,$db_user, $db_password, $db_name);
if ($db->connect_errno) {
	//if the connection to the db failed
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}

$livetime = time() - 3600;
$beforeOneHour = date("Y-m-d H:i:s", $livetime);
$query="SELECT * FROM chat WHERE time > $beforeOneHour ORDER BY id ASC";
//execute query
if ($db->real_query($query)) {
	//If the query was successful
	$res = $db->use_result();

    while ($row = $res->fetch_assoc()) {
        $username=$row["username"];
        $text=$row["text"];
        $time=date('g:i a', strtotime($row["time"])); //outputs date as # #Hour#:#Minute#

        echo "<p>$time , $beforeOneHour |=> $username: $text</p>\n";
    }
}else{
	//If the query was NOT successful
	echo "An error occured";
	echo $db->errno;
}

$db->close();
?>
