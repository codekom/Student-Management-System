<?php
  include "connect.php";
  include "function.php";
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
<form action="admin_result.php" method="post">
<h2><select name="course">
        <option value="select">select</option>
        <?php
		   while($row=mysql_fetch_array($result))
		   {
			   echo "<option value=\"$row[c_id]\">$row[c_name]</option>";
		   }
		 ?> 
         </select>
<input type="submit" value="View" name="view" style="font-size:15px">
<a href="index.php"><input type="button" value="back" style="font-size:15px"></a>
</h2>
</form>
<?php
if(isset($_POST['view']))
{
	extract($_POST);
?>
     <table> 
     <tr style="height:30px">
      <td colspan="4"> <h1>STUDENT DETAILS</h1></td>
     </tr>   
     <tr>
        <td><i><u>Sl.No.</u></i></td>
        <td><i><u>Name</u></i></td>
        <td><i><u>Course</u></i></td>
        <td><i><u>Action</u></i></td>
     </tr>
 <?php    
     $r=1;
	 $s="select `s_name`,`s_id` from `student` where `cid`='$course'";
	 $res=mysql_query($s);
	 $sq="select `c_name` from `course` where `c_id`='$course'";
	 $q=mysql_query($sq);
	 $t=mysql_fetch_array($q);
	 while($res2=mysql_fetch_array($res))
	 {
		$rp=checkresult($res2['s_id']);
			if($rp>0)
			{
			$pre_result="Update Result";
			$link="update_result.php";
			}
			else
			{
			$pre_result="ADD Result";
			$link="add_result.php";
			}
        echo "<tr><td>$r</td>
		       <td>$res2[s_name]</td>
			   <td>$t[c_name]</td>
			   <td><a href=\"$link?edit_id=$res2[s_id]&C=$t[c_name]\">$pre_result</a>&nbsp;
			   |&nbsp;<a href=\"process.php?dl_id=$res2[s_id]\">Delete result</a></td>
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