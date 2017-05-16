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
.main{
	width:600px;
	background-color:#643200;
	color:#FFF;
	height:300px;
	margin:auto;
}
body{
	background-color:#804000;
}
</style>
</head>
<body>
<form action="process.php" method="post" enctype="multipart/form-data">
<div class="main">
<table width="600">
<tr>
  <td colspan="2" style="text-align:center"><h2><u>EDIT NEWS</u></h2></td>
</tr>  
<tr>
  <td width="100" style="padding-left:50px">select news</td>
  <td><input type="radio" name="n" value="Click here to view the new books available at library.">Click here to view the new books available at library.<br>
<input type="radio" name="n" value="Semester Registration details">Semester Registration details<br>
<input type="radio" name="n" value="Techfest News">Techfest News<br>
<input type="radio" name="n" value="Cultural Fest News">Cultural Fest News<br>
<input type="radio" name="n" value="Events to be held on Sports Fiesta">Events to be held on Sports Fiesta<br><br></td>
</tr>
<tr>
  <td width="100" style="padding-left:50px">Upload file</td>
  <td><input type="file" name="upl"></td>
</tr>  
<tr>
  <td colspan="2" style="text-align:center"><h2><input type="submit" name="editnw" value="submit">
<a href="index.php" style="text-decoration:none"><input type="button" value="back"></a></h2></td>
</tr>
</table>
</div>
</form>
<?php
  if(isset($_GET['k']))
    echo $_GET['k'];
	?>
</body>
</html>