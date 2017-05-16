<?php
  include "connect.php";
  session_start();
  if(!isset($_SESSION['user']))
     header("location:login.php?msg=PLZ LOGIN");
  if(isset($_GET['cid']))
  {
	  $id=$_GET['cid'];
	  $sql="select * from `course` where `c_id`='$id'";
	  $result=mysql_query($sql);
	  $row=mysql_fetch_array($result);
  }
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
  <legend><h2>EDIT COURSE</h2></legend>
  <table width="800">
    <tr>
      <td width="200">Course Title</td>
      <td><input type="text" name="nm" size="30" value="<?=$row['c_name']?>"></td>
    </tr>
    <tr>
      <td width="200">Course Description</td>
      <td><textarea rows=6 cols=60 name="msg"><?=$row['c_desc']?></textarea></td>
    </tr>
    <tr>
      <td width="200">Course Duration</td>
      <td><input type="text" name="dur" size="30" value="<?=$row['c_dur']?>"></td>
    </tr>
    <tr>
    <td colspan="2" align="center"><br><input type="submit" value="submit" name="sbmt2" style="border:none">&nbsp;
          <input type="reset" value="cancel" name="cancel" style="border:none">
          <input type="hidden" value="<?=$row['c_id']?>" name="ccid">
          <a href="course.php" style="text-decoration:none"><input type="button" value="back" style="border:none"></a>
    </td>
   </tr> 
   </table>
</fieldset>    
</form>
</body>
</html>