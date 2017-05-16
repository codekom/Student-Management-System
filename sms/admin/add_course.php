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
<form action="add_course.php" method="post">
<fieldset>
  <legend><h2>ADD COURSE</h2></legend>
  <table width="800">
    <tr>
      <td width="200">Course Title</td>
      <td><input type="text" name="nm" size="30"></td>
    </tr>
    <tr>
      <td width="200">Course Description</td>
      <td><textarea rows=6 cols=60 name="msg"></textarea></td>
    </tr>
    <tr>
      <td width="200">Course Duration</td>
      <td><input type="text" name="dur" size="30"></td>
    </tr>
    <tr>
    <td colspan="2" align="center"><br><input type="submit" value="submit" name="sbmt" style="border:none">&nbsp;
          <input type="reset" value="cancel" name="cancel" style="border:none">
          <a href="course.php" style="text-decoration:none"><input type="button" value="back" style="border:none"></a> 
    </td>
 </tr> 
   </table>
</fieldset>    
</form>
<?php
   if(isset($_POST['sbmt']))
   {
	   extract($_POST);
	   $sql="insert into `course` values(NULL,'$nm','$msg','$dur')";
	   $res=mysql_query($sql);
	   if($res)
	      header("location:course.php?msg=New course added successfully.");
	   else
	      header("location:course.php?msg=New course could not be added.");	 	 
   }
   ?>
</body>
</html>