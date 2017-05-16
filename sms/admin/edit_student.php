<?php
  include "connect.php";
  session_start();
  if(!isset($_SESSION['user']))
     header("location:login.php?msg=PLZ LOGIN");
  if(isset($_GET['edit_id']))
  {
	  $id=$_GET['edit_id'];
	  $sql="select * from `student` where `s_id`='$id'";
	  $result=mysql_query($sql);
	  $row=mysql_fetch_array($result);
  }
  $sql="select * from `course`";
  $result=mysql_query($sql);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
fieldset{
	margin:auto;
	width:800px;
	margin-top:100px;
	border:2px solid #000;
}
body{
	background-color:#D5D5D5;}
input{
	border:2px solid #000;
}
textarea{
	border:2px solid #000;
}	
</style>
</head>

<body>
<form action="process.php" method="post">
<fieldset>
  <legend><h2>EDIT STUDENT DETAILS</h2></legend>
  <table width="800">
    <tr>
      <td width="200">Name</td>
      <td><input type="text" name="name" size="30" value="<?=$row['s_name']?>" readonly></td>
    </tr>
    <tr>
      <td width="200">email</td>
      <td><input type="text" name="email" size="30" value="<?=$row['s_email']?>" readonly></td>
    </tr>
    <tr>
      <td width="200">Phone no</td>
      <td><input type="text" name="phn" size="30" value="<?=$row['s_phone']?>" readonly></td>
    </tr>
    <tr>
      <td width="200">Courses</td>
      <td><select name="course">
        <option value="select">select</option>
        <?php
		   while($row2=mysql_fetch_array($result))
		   {
			   echo "<option value=\"$row2[c_id]\">$row2[c_name]</option>";
		   }
		 ?> 
         </select> 
      </td>
    </tr>
    <tr>
      <td width="200">Password</td>
      <td><input type="text" name="pw" size="30" value="<?=$row['password']?>"></td>
    </tr>
    <tr>
    <td colspan="2" align="center"><br><input type="submit" value="Update" name="sbmt3" style="border:none">&nbsp;
          <input type="reset" value="cancel" name="cancel" style="border:none">
          <input type="hidden" value="<?=$row['s_id']?>" name="ssid">
        <a href="student_details.php" style="text-decoration:none"><input type="button" value="back" style="border:none"></a>
    </td>
   </tr> 
   </table>
</fieldset>    
</form>
</body>
</html>