<?php
   include "connect.php";
   session_start();
   if(!isset($_SESSION['user']))
     header("location:login.php?msg=PLZ LOGIN");
   $sql="select * from `student`";
   $result=mysql_query($sql);
  ?>	 
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
table{
	width:800px;
	margin:auto;
	border:2px solid #000;
	border-radius:10px;
	box-shadow:3px 4px 10px;
	background-color:#FF91C8;
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
body{
	background-color:#FFD2E9;
}
</style>	
</head>

<body>
<form action="process.php" method="post">
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
	 while($row=mysql_fetch_array($result))
	 {
		 $s="select `c_name` from `course` where `c_id`='$row[cid]'";
		 $res=mysql_query($s);
		 $res2=mysql_fetch_array($res);
		 if($row['status']==0)
		   $aprove="Approve";
		 else
		   $aprove="Disapprove";
        echo "<tr><td>$r</td>
		       <td>$row[s_name]</td>
			   <td>$res2[c_name]</td>
			   <td><a href=\"edit_student.php?edit_id=$row[s_id]\">Edit</a>&nbsp;
			   |&nbsp;<a href=\"process.php?del_id=$row[s_id]\">Delete</a>&nbsp;|
			   <a href=\"process.php?ap=$row[s_id]&st=$row[status]\">$aprove</a></td>
			   </tr>";		
	   $r++;		   
	 }
	 ?>
</table>
<h2><a href="index.php" title="Click here to go to main page">
    <input type="button" size="50" value="Back"></a></h2>
</form>
<table>
 <tr>
   <td>
   <?php
     if(isset($_GET['sg']))
	   echo $_GET['sg'];
	 ?>
    </td>
  </tr>
</table>  
</body>
</html>