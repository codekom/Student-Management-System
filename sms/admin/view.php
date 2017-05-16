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
body{
	background-color:#D8D8D8;
}
table{
	width:800px;
	margin:auto;
	border:2px solid #000;
	border-radius:10px;
	box-shadow:3px 4px 10px;
	background-color:#FBFBFB;
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
a{
	text-decoration:none;
}
</style>
</head>

<body>
<form action="view.php" method="post">
<h2><select name="course">
        <option value="select">select</option>
        <?php
		   while($row=mysql_fetch_array($result))
		   {
			   echo "<option value=\"$row[c_name]\">$row[c_name]</option>";
		   }
		 ?> 
         </select>
<input type="submit" value="Go" name="go" style="font-size:15px">
<a href="index.php" title="Click here to go to main page"><input type="button" style="font-size:15px" value="Back">
</h2>
</form>
<?php
  if(isset($_POST['go']))
  {
	  extract($_POST);
?>
<table> 
     <tr style="height:30px">
      <td colspan="3"> <h1>Uploaded Files for <?=$course?></h1></td>
     </tr>   
     <tr>
        <td><i><u>Sl.No.</u></i></td>
        <td><i><u>Title of File</u></i></td>
        <td><i><u>Action</u></i></td>
     </tr>
 <?php    
     $r=1;
	 $sq="select `c_id` from `course` where `c_name`='$course'";
	 $q=mysql_query($sq);
	 $t=mysql_fetch_array($q);
	 $s="select * from `upload` where `crs_id`='$t[c_id]'";
	 $res=mysql_query($s);
	 while($res2=mysql_fetch_array($res))
	 {
        echo "<tr><td>$r</td>
			   <td>$res2[file_title]</td>
			   <td><a href=\"process.php?delf=$res2[u_id]\">Delete</a></td>
			   </tr>";		
	   $r++;		   
	 }
	 ?>
</table>
<?php
}
?>
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