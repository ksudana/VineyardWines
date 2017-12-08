<?php
require("./_connect.php");
session_start();

date_default_timezone_set('America/Chicago');

$uid = $_SESSION['uid'];

$db = new mysqli($db_host,$db_user, $db_password, $db_name);
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}

$livetime = strtotime('-1 hour');

$query="SELECT Users.uid AS uid, Users.username AS username, chat.text, chat.time FROM Users,chat WHERE Users.username=chat.username ORDER BY id ASC";
if ($db->real_query($query)) {
	$res = $db->use_result();

    while ($row = $res->fetch_assoc()) {
        $username=$row["username"];
        $text=$row["text"];
        $user_id=$row["uid"];
        $time=strtotime($row["time"]);
        $datetime = date('g:i a', $time);
        if($time >= $livetime){
                  echo "<p>$datetime | <a href= 'otherusers.php?otherid=" . $user_id . "'>". $username ."</a> : $text</p>\n";
        }
    }
}else{
	echo "An error occured";
	echo $db->errno;
}

$db->close();
?>
