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
div
{
	margin:auto;
	margin-top:100px;
	border-radius:20px;
	width:500px;
	box-shadow:8px 7px 9px;
} 
h1
{
	text-align:center;
	background-color:#AF6161;
	margin:0px;
	padding:0px;
	height:55px;
	border-top-left-radius:10px;
	border-top-right-radius:10px;	
}
body
{
	background-color:#EBEBEB;
}
td
{ 
  text-align:center;
}
a
{
	text-decoration:none;
}
</style>
</head>

<body>
<form action="update_result.php" method="post">
<div>
<h1>STUDENT RESULT</h1>
<table width="500" bgcolor="#FEFEFE" height="400">   
 <tr>
    <td width="200">Student id</td>
    <td><input type="text" name="nam" size="30" value="<?=$_GET['edit_id']?>" readonly></td>
 </tr>
 <tr>
    <td width="200">Course</td>
    <td><input type="text" name="crs" size="30" value="<?=$_GET['C']?>" readonly></td>
 </tr>
 <tr>
    <td width="200">Full Marks</td>
    <td><input type="text" name="fm" size="30"></td>
 </tr>
 <tr>
    <td width="200">Marks Obtained</td>
    <td><input type="text" name="mo" size="30"></td>
 </tr>
 <tr>
    <td width="200">Grade</td>
    <td><input type="text" name="gd" size="30"></td>
 </tr> 
 <tr>
    <td colspan="2" align="center"><br><input type="submit" value="submit" name="upreslt">
          <input type="reset" value="cancel" name="cancel">
          <a href="admin_result.php"><input type="button" value="back"></a>
    </td>
 </tr> 	       
 <tr>
  <td colspan="2">
  <?php
   if(isset($_POST['upreslt']))
   {
	   extract($_POST);
       $sq="update `result` set `fullmarks`='$fm',`marks_obt`='$mo',`grade`='$gd' where `student_id`='$nam'";
	   $res=mysql_query($sq);
	   if($res)
	     header("location:admin_result.php?msg=Result updated");
	   else
	     header("location:admin_result.php?msg=Result could not be updated");
   }
   ?>
   </td>
  </tr> 
</table>
</form>	
</div>	     
</body>
</html>