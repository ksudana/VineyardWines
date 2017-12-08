<?php
require("./_connect.php");
session_start();

date_default_timezone_set('America/Chicago');


//connect to db
$uid = $_SESSION['uid'];

$db = new mysqli($db_host,$db_user, $db_password, $db_name);
if ($db->connect_errno) {
	//if the connection to the db failed
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}

$livetime = date('g:i a', strtotime('-1 hour'));

#$query="SELECT * FROM chat ORDER BY id ASC";
$query = "SELECT Users.uid AS uid, chat.username AS username, chat.text AS text, chat.id AS id FROM Users, chat WHERE Users.username = chat.username ORDER BY chat.id ASC";
//execute query
if ($db->real_query($query)) {
	//If the query was successful
	$res = $db->use_result();

    while ($row = $res->fetch_assoc()) {
        $username=$row["username"];
        $text=$row["text"];
        $time=date('g:i a', strtotime($row["time"]));
        if($time >= $livetime){
                echo "<p>$time | <a href= 'otherusers.php?otherid=" . $uid . "'>". $username ."</a> : $text</p>\n";
        }
    }
}else{
	//If the query was NOT successful
	echo "An error occured";
	echo $db->errno;
}

$db->close();
?>
