<?php
  include "connect.php";
  session_start();
  if(!isset($_SESSION['user']))
     header("location:login.php?msg=PLZ LOGIN");
  $sql="select * from `course`";
  $result=mysql_query($sql);
  ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
table{
	width:700px;
	margin:auto;
	border:2px solid #000;
	border-radius:10px;
	box-shadow:3px 4px 10px;
	background-color:#F99;
}
td{
	width:200px;
	text-align:center;
	font-size:18px;
	border:2px solid #000;
}
tr{
	height:75px;
}
h1
{
	text-align:center;
	background-color:#F69;
	width:700px;
	margin:0px;
	padding:0px;
	margin:auto;
}
h2
{
	text-align:center;
}
input{
	font-size:25px;}
body{
	background-image:url(images/books.jpg);
}
a{
	text-decoration:none;}
</style>
</head>

<body>
<form action="add_course.php" method="post">
<table> 
<tr style="height:30px">
   <td colspan="4"> <h1>COURSES</h1></td>
</tr>   
<tr>
   <td><i><u>Sl.No.</u></i></td>
   <td><i><u>Course Title</u></i></td>
   <td><i><u>Duration</u></i></td>
   <td><i><u>Action</u></i></td>
</tr>
   <?php
     $r=1;
	 while($row=mysql_fetch_array($result))
	 {
        echo "<tr><td>$r</td>
		       <td>".$row['c_name']."</td>
			   <td>".$row['c_dur']."</td>
			   <td><a href=\"edit_course.php?cid=".$row['c_id']."\">Edit</a>&nbsp;
			   |&nbsp;<a href=\"process.php?d_id=".$row['c_id']."\">Delete</a></td></tr>";		
	   $r++;		   
	 }
	 ?>
</table>
<h2><input type="submit" size="50" value="Add Course" name="add">&nbsp;&nbsp;
    <a href="index.php" title="Click here to go to main page">
    <input type="button" size="50" value="Back"></a>
</h2>
</form>
<table>
 <tr>
   <td>
   <?php
     if(isset($_GET['msg']))
	   echo $_GET['msg'];
	 ?>
    </td>
  </tr>
</table>     
</body>
</html>