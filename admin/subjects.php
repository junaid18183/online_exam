<?php
ob_start();
// Copyright (C) 2003 - 2007 Juned Memon.  All rights reserved.
// Any redistribution or reproduction of any materials herein is strictly prohibited.
?>
<html><!-- InstanceBegin template="/Templates/Admin%20Layout.dwt.php" codeOutsideHTMLIsLocked="true" -->
<head>
<?php
session_start();
include "../includes/timerhead.php";
include "../includes/conn.php";
include "../includes/includes.php";
include "../includes/nocache.php";


?>
<!-- InstanceBeginEditable name="doctitle" -->
<title>WebTester Online Testing</title>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<link href="../includes/wtstyle.css" rel="stylesheet"  type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<script language="javascript" type="text/javascript" src="../includes/tableH.js"></script>
<script language="Javascript" src="../editor/scripts/innovaeditor.js"></script>
<script language="javascript">
function checkIt(string)
{
        var detect = navigator.userAgent.toLowerCase();
        place = detect.indexOf(string) + 1;
        thestring = string;
        return place;
}
</script>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div align="center">
  <table width="100%" height="50" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#333333" BORDERCOLORLIGHT="#999999" BORDERCOLORDARK="#333333">
    <tr>
      <td width="338" align="center" valign="top"><div align="left"><a href="./index.php"><img src="../images/webtestertop.gif" width="337" height="75" border="0"></a></div></td>
      <td align="center" valign="middle"><!-- InstanceBeginEditable name="CurrentArea" -->
        <p class="style4">Subject Management</p>
        <!-- InstanceEndEditable --></td>
    </tr>
  </table>
  <div class="hr"><hr /></div>
  <table width="100%" height="50" border="0" align="center" cellpadding="3" cellspacing="1" bordercolor="#333333" BORDERCOLORLIGHT="#999999" BORDERCOLORDARK="#333333">
    <tr>
      <td align="center" valign="top"><table width="100%"  border="0" cellspacing="2" cellpadding="0">
        <tr>
          <td><div align="center"><span class="style1"><a href="testManage.php"><img src="../images/tests.gif" width="48" height="48" border="0"><br>
            Tests</a></span></div></td>
          <td><div align="center"><span class="style1"><a href="subjects.php"><img src="../images/subjects.gif" width="48" height="48" border="0"><br>
            Subjects</a></span></div></td>
          <td><div align="center"><span class="style1"><a href="currentSessions.php"><img src="../images/sessions.gif" width="48" height="48" border="0"><br>
            Sessions</a></span></div></td>
          <td><div align="center"><span class="style1"><a href="viewReports.php"><img src="../images/reports.gif" width="48" height="48" border="0"><br>
            Reports</a></span></div></td>
          <td><div align="center"><span class="style1"><a href="preferences.php"><img src="../images/preferences.gif" width="48" height="48" border="0"><br>
            Preferences</a></span></div></td>
          <td><div align="center"><span class="style1"><a href="logout.php"><img src="../images/logout.gif" width="48" height="48" border="0"><br>
            Logout</a></span></div></td>
        </tr>
      </table>        </td>
    </tr>
    <tr>
      <td align="center" valign="top">
                  <div align="left" class="style2">
          <?php
        if (isset($_SESSION['loggedInName'])) {
                if ($_SESSION['loggedInName'] != "") {
                ?>
          <div align="center">Currently logged in as:
            <?=$_SESSION['loggedInName']?>
                  </div>
            <?php
                }
        }
?>
                   <div class="hr"><hr /></div><br>
                   <!-- InstanceBeginEditable name="nav" --><a href="index.php">WebTester</a> &gt; Subject Management <!-- InstanceEndEditable --></div></td>
    </tr>
    <tr>
      <td align="center" valign="top">          <div align="left"><!-- InstanceBeginEditable name="Content Area" -->
                <?php
                if ($_SESSION['loggedIn'] != "1") {
                        redirect_to("index.php?ref=subjects.php");
                        exit;
                }
                ?>
                <script type="text/javascript">
                        function checkUncheckAll(theElement) {
     var theForm = theElement.form, z = 0;
         for(z=0; z<theForm.length;z++){
      if(theForm[z].type == 'checkbox' && theForm[z].name != 'checkall'){
          theForm[z].checked = theElement.checked;
          }
     }
    }
                </script>
        <form action="deleteSubject.php" method="post" name="delete" id="delete">
                <p><span class="style7">Subjects</span></p>
          <table width="100%"  border="0" cellspacing="2" cellpadding="0">
            <tr bgcolor="#EBEBEB">
              <td width="40"><div align="center"><a href="addSubject.php"><img src="../images/new.gif" alt="New Subject" width="19" height="18" border="0" title="New Subject"></a></div></td>
              <td width="40"><div align="center">
                <input type="image" alt="Delete Selected Subjects" value="Delete Selected Subjects" id="Del" name="Del" src="../images/delete.png" width="18" height="18" title="Delete Selected Subjects">
              </div></td>
              <td width="40" class="style1 style5"><div align="center"><a href="subjectStats.php"><img src="../images/questionstats.png" width="18" height="18" border="0"></a></div></td>
              <td class="style1 style5">&nbsp;</td>
              </tr>
          </table>
            <?php
                        if (!isset($_REQUEST['sort'])) {
                                $sort="Name";
                        } else {
                                $sort=$_REQUEST['sort'];
                        }
                        if (!isset($_REQUEST['order'])) {
                                $order="ASC";
                        } else {
                                $order=$_REQUEST['order'];
                        }
// $subjectSQL="SELECT * FROM Subjects WHERE Creator = '" . $_SESSION['loggedInName'] . "' ORDER by " . $sort . " " . $order;
$subjectSQL="SELECT * FROM Subjects ORDER by " . $sort . " " . $order;
$result=mysql_query($subjectSQL, $conn);
$num_rows=mysql_num_rows($result);
if ($num_rows != 0) {
?>
<table span class="style1 style5"width="100%"  border="0" cellspacing="2" cellpadding="0" onMouseOut="javascript:highlightTableRowVersionA(0);">
  <tr bgcolor="#C8D8FF">
    <td width="40" align="center"><input name="checkall" type="checkbox" class="style1 " id="checkall" value="checkall" onClick="checkUncheckAll(this);"></td>
    <td width="65" align="center"><span class="style1 style5"><a href="./subjects.php?sort=ID&order=ASC&view=<?=$_REQUEST['view']?>">ID<br>
      <img src="../images/down.gif" width="10" height="10" border="0"></a><a href="./subjects.php?sort=ID&order=DESC&view=<?=$_REQUEST['view']?>"><img src="../images/up.gif" width="10" height="10" border="0"></a> </span></td>
    <td width="350" align="center"><a href="./subjects.php?sort=Name&order=ASC&view=<?=$_REQUEST['view']?>"><span class="style1 style5">Subject</span><br>
      <img src="../images/down.gif" width="10" height="10" border="0"></a><a href="./subjects.php?sort=Name&order=DESC&view=<?=$_REQUEST['view']?>"><img src="../images/up.gif" width="10" height="10" border="0"></a></td>
    <td align="center"><span class="style1 style5"><a href="./subjects.php?sort=Description&order=ASC&view=<?=$_REQUEST['view']?>">Description<br>
      <img src="../images/down.gif" width="10" height="10" border="0"></a><a href="./subjects.php?sort=Description&order=DESC&view=<?=$_REQUEST['view']?>"><img src="../images/up.gif" width="10" height="10" border="0"></a> </span></td>
  </tr>
<?php
        while($row = mysql_fetch_assoc($result)) {
        $i++;
        ?>
        <tr class="d<?=$i & 1?>" onMouseOver="javascript:highlightTableRowVersionA(this, '#FFFF99');">
        <?php
                echo("<td width='40' align='center'><input name='delete[]' type='checkbox' value='" . $row['ID'] . "'></td>");
                echo("<td width='65' align='left'>" . $row['ID'] . "</td>");
                echo("<td align='left'><A class='pointer' HREF='editSubject.php?SubjectID=" . $row['ID'] . "'>" . $row['Name'] . "</A></td>");
                echo("<td align='left'>" . $row['Description'] . "</td>");
        }
        ?>
        </table>
        <?php
}
                ?>
          </p>
        </form>
        <p align="center">&nbsp;</p>
        <!-- InstanceEndEditable --> </div>     <div class="hr"><hr /></div>
</td>
    </tr>
    <tr>
    </tr>
  </table>
</div>
</body>
<!-- InstanceEnd --></html>
<?php ob_end_flush() ?>
