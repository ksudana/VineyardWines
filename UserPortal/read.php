<?php
require("./_connect.php");
session_start();

date_default_timezone_set('America/Chicago');

$uid = $_SESSION['uid'];

$db = new mysqli($db_host,$db_user, $db_password, $db_name);
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}

$livetime = date('g:i a', strtotime('-1 hour'));

$query="SELECT * FROM chat ORDER BY id ASC";
if ($db->real_query($query)) {
	$res = $db->use_result();

    while ($row = $res->fetch_assoc()) {
        $username=$row["username"];
        $text=$row["text"];
        $time=date('g:i a', strtotime($row["time"]));
        if($time < $livetime){
            echo"<p> $time | $username: $text </p>\n";
        }
    }
}else{
	echo "An error occured";
	echo $db->errno;
}

$db->close();
?>
