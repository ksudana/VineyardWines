<?php
    session_start();
	require("./_connect.php");

//connect to db
$db = new mysqli($db_host,$db_user, $db_password, $db_name);
if ($db->connect_errno) {
    //if the connection to the db failed
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}


//get userinput from url
$uid = $_SESSION['uid'];
$query = "SELECT * FROM Users WHERE uid='$uid'";
$result = $db->query($query);
if(!$result) {
	echo "Bad Query";
}
$row = $result->fetch_assoc();
if(!$row) {
  echo "Invalid User!";
}

$username = $row['username'];

$text=substr($_GET["text"], 0, 128);
//escaping is extremely important to avoid injections!
$nameEscaped = htmlentities(mysqli_real_escape_string($db,$username)); //escape username and limit it to 32 chars
$textEscaped = htmlentities(mysqli_real_escape_string($db, $text)); //escape text and limit it to 128 chars



//create query
$query="INSERT INTO chat (username, text) VALUES ('$nameEscaped', '$textEscaped')";
//execute query
if ($db->real_query($query)) {
    //If the query was successful
    echo "Wrote message to db";
}else{
    //If the query was NOT successful
    echo "An error occured";
    echo $db->errno;
}

$db->close();
?>
