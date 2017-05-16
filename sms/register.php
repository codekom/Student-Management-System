<?php
  include "connect.php";
  $sql="select * from `course`";
  $result=mysql_query($sql);
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
	margin-top:25px;
	border-radius:20px;
	width:500px;
	box-shadow:8px 7px 9px;
} 
h1
{
	text-align:center;
	background-color: #55F;
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
  height:60px;
}
a
{
	text-decoration:none;
	color:#181818;
}
</style>
</head>

<body>
<form action="process.php" method="post" enctype="multipart/form-data">
<div>
<h1>STUDENT REGISTRATION</h1>
<table width="500" bgcolor="#FEFEFE" height="400">   
 <tr>
    <td width="200">Name</td>
    <td><input type="text" name="name" size="30"><br>
        <?php if(isset($_GET['mg1']))echo $_GET['mg1']; ?></td>
 </tr>
 <tr>
    <td width="200">email</td>
    <td><input type="text" name="email" size="30"><br>
       <?php if(isset($_GET['mg2']))echo $_GET['mg2']; ?></td>
 </tr>
  <tr>
    <td width="200">Phone no.</td>
    <td><input type="text" name="phone" size="30"><br>
       <?php if(isset($_GET['mg3']))echo $_GET['mg3']; ?></td>
 </tr>
  <tr>
    <td width="200">Courses</td>
    <td><select name="course">
        <option value="select">select</option>
        <?php
		   while($row=mysql_fetch_array($result))
		   {
			   echo "<option value=\"$row[c_id]\">$row[c_name]</option>";
		   }
		 ?> 
         </select> <br>
    <?php if(isset($_GET['mg4']))echo $_GET['mg4']; ?></td>
 </tr>
 <tr>
    <td width="200">Password</td>
    <td><input type="password" name="psw" size="30"><br>
       <?php if(isset($_GET['mg5']))echo $_GET['mg5']; ?></td>
 </tr>
 <tr>
    <td width="200">Confirm Password</td>
    <td><input type="password" name="psw2" size="30"><br>
	    <?php if(isset($_GET['mg6']))echo $_GET['mg6']; ?>
        <?php if(isset($_GET['mg7']))echo $_GET['mg7']; ?></td>
 </tr>
 <tr>
    <td width="200">Upload Photo</td>
    <td><input type="file" name="pic"></td>
 </tr>  
 <tr>
    <td colspan="2" align="center"><br><input type="submit" value="register" name="register">
          <input type="reset" value="cancel" name="cancel">
          <a href="index.php"><input type="button" size="20" value="Back"></a>
    </td>
 </tr>  
 <tr>
   <td colspan="2" align="center" style="height:40px">
     <?php
	   if(isset($_GET['m']))
          echo $_GET['m']; 
	 ?>
    </td>
  </tr>   	       
</table>
</form>	
</div>
</body>
</html>