<?php
   include "connect.php";
   session_start();
   if(!isset($_SESSION['user']))
     header("location:login.php?msg=PLZ LOGIN");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
table
{
	width:100%;
	height:650px;
	border:0px;
	float:left;
	background-color:#066;
}
a{
	color:#FF3;
}
h2{
	padding:0px;
	margin:0px;
	color:#FF0;}
</style>
</head>
<body>
<table>
<tr bgcolor="#063" valign="bottom" height="150">
  <td colspan="2" style="padding-left:1100px"><h2>HI! <?=$_SESSION['user']?>&nbsp;&nbsp;<a href="process.php?log=y">Log out</a></h2></td>
</tr>
<tr>
  <td width="200">
   <ul>
     <li><a href="course.php">Course</a></li><br>
     <li><a href="process.php?cp=1">Change Password</a></li><br>
     <li><a href="student_details.php">Student Details</a></li><br>
     <li><a href="admin_result.php">Result</a></li><br>
     <li><a href="view.php">View uploaded files</a></li><br>
     <li><a href="upload.php">Upload files</a></li><br>
     <li><a href="upload_news.php">Upload news</a></li><br>
     <li><a href="edit_news.php">Edit news</a></li>
   </ul>
  </td>
  <td bgcolor="#009966"></td>
</tr>       
</table>
</body>
</html>