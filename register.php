<?php
include "./includes/conn.php";
include "./includes/includes.php";

if ($_REQUEST['password'] != $_REQUEST['confirm']) {
	die("Password doesn't match");
}

if ($_REQUEST['username'] == "") {
	die("No username");
}

$registerCheckSQL="SELECT * FROM Users WHERE Username='" . $_REQUEST['username'] . "'";

$checkResult=mysql_query($registerCheckSQL, $conn);

if (mysql_num_rows($checkResult) > 0) {
	die("User already exists...");
}
/*

mysql> select * from Subjects;
+----+---------+-------------+---------+-----------+
| ID | Name    | Description | Correct | Incorrect |
+----+---------+-------------+---------+-----------+
|  2 | Linux   | Linux       |      47 |       166 |
|  3 | Windows | Windows     |       0 |         0 |
|  4 | Database| Database    |       0 |         0 |
+----+---------+-------------+---------+-----------+
2 rows in set (0.00 sec)


*/
##############################################
$LimitedSubjects="";
switch ($_REQUEST['subject'])
{
case Linux:
$LimitedSubjects="2";
  break;
case Windows:
$LimitedSubjects="3";
  break;
case Database:
$LimitedSubjects="4";  
break;
default:
$LimitedSubjects="";

}


##############################################
$registerSQL="INSERT INTO Users
			(Username,
			Password,
			FirstName,
			LastName,
                        Limited,LimitedSubjects,
			Email)
			VALUES
			('" . mysql_escape_string($_REQUEST['username']) . "',
			'" . md5(mysql_escape_string($_REQUEST['password'])) . "',
			'" . mysql_escape_string($_REQUEST['firstname']) . "',
			'" . mysql_escape_string($_REQUEST['lastname']) . "',1,
                        $LimitedSubjects,
			'" . mysql_escape_string($_REQUEST['email']) . "')";
$result=mysql_query($registerSQL, $conn)
	or die("Invalid Query: " . $registerSQL . " - " . mysql_error());
	
redirect_to("userLogin.php");



?>
