<?php
	  if (!isset($go)) {
	  	$go=false;
	  }
	  if (!isset($inTest)) {
	  	$inTest=false;
	  }
	  if (!isset($inReview)) {
	  	$inReview=false;
	  }
	  if (!isset($finished)) {
	  	$finished=false;
	  }
	  if (IPSESSIONS) {
	  	$strSQL="SELECT * From Sessions WHERE IP='" . $ip . "'";
	  } else {
	  	$strSQL="SELECT * From Sessions WHERE ID='" . $sessID . "'";
	  }
	  $result=mysql_query($strSQL, $conn);
	  $num_rows=mysql_num_rows($result);
	  $row=mysql_fetch_array($result);
	  if ($num_rows != 0) {
		  if ($go) {
		  	$answersSQL="DELETE FROM Answers WHERE SessionID='" . $sessID . "'";
			$result=mysql_query($answersSQL)
				or die("Invalid Query: " . $answersSQL . " - " . mysql_error());
			if (IPSESSIONS) {
				$sessionsSQL="DELETE FROM Sessions WHERE IP='" . $ip . "'";
			} else {
				$sessionsSQL="DELETE FROM Sessions WHERE ID='" . $sessID . "'";
			}
			$result=mysql_query($sessionsSQL)
				or die("Invalid Query: " . $sessionsSQL . " - " . mysql_error());
			session_destroy();
			redirect_to("go.php?testID=" . $_GET['testID']);
			exit;
		  }
		  if ($row['finished']) {
			 if (!$finished) {
			 	redirect_to("grade.php");
			 	exit;
			 }
		  } elseif ($row['review']) {
		  	if (!$inReview and !isset($_POST['Save'])) {
				redirect_to("reviewTest.php");
		  		exit;
		  	} elseif (isset($_REQUEST['Grade'])) {
		  		// do nothing
		  	}
		  } elseif ($row['takingTest']) {
			if (!$inTest) {
				redirect_to("test.php");
				exit;
			}
		  }
	  } else {
	  	 if ($inTest) {
			  	redirect_to("index.php");
		}
	  }
?>