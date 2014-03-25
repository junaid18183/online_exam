<?php
require_once("db-conf.php");
require_once("conf.php");
require_once("language_strings.php");

// if (SQL_TYPE == "mysql") {
	$conn=mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
		or die('Could not connect to the database; ' . mysql_error());
	
	mysql_select_db(SQL_DB, $conn)
		or die('Could not select database; ' . mysql_error());
// } elseif (SQL_TYPE == "sqlite") {
	// $conn = sqlite_open(SQLITE_DB);
// }
?>
