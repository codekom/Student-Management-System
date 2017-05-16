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
	background-color:#F19AB3;
}
h2
{
	text-align:center;
}
fieldset
{
	width:700px;
	margin:auto;
}
td{
	text-align:center;
	height:50px;
}
a
{
	text-decoration:none;
}
</style>
</head>

<body>
<form action="upload.php" method="post">
<h2><select name="course">
        <option value="select">select</option>
        <?php
		   while($row=mysql_fetch_array($result))
		   {
			   echo "<option value=\"$row[c_name]\">$row[c_name]</option>";
		   }
		 ?> 
         </select>
<input type="submit" value="submit" name="upl" style="font-size:15px">
<a href="index.php"><input type="button" value="back" style="font-size:15px"></a>
</h2>
<h2>
<?php
  if(isset($_GET['m']))
    echo $_GET['m'];
?>
</form>
<?php
if(isset($_POST['upl']))
{
	extract($_POST);
?>	
<fieldset>
  <legend><?=$course?></legend>
  <form action="upload.php" method="post" enctype="multipart/form-data">
  <table width="700">
    <tr>
      <td width="200">Title of File</td>
      <td><input type="text" name="fname" size="30"></td>
    </tr>
    <tr>
      <td width="200">Select File</td>
      <td><input type="file" name="upload" size="30"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="sb" value="upload">
                      <input type="hidden" name="hd" value="<?=$course?>">
      </td>
    </tr>
  </table>
 </form> 
</fieldset>  
<?php
}
if(isset($_POST['sb']))
{
	extract($_POST);
	$filename=$_FILES['upload']['name'];
	if(!empty($filename))
	{
	    $ext=explode(".",$filename);
	    $ext=end($ext);
	    if($ext=="ppt"||$ext=="doc"||$ext=="txt"|| $ext=="docx"|| $ext=="pdf")
	    {
	   	   $filename="upld/".$filename;
		   if(!copy($_FILES['upload']['tmp_name'],$filename))
		      header("location:upload.php?m=File could not be uploaded.");	 
	    }
		else
		{
			 header("location:upload.php?m=File type not supported.");
		}
	}
	$s="select `c_id` from `course` where `c_name`='$hd'"; 
    $res=mysql_query($s);
	$t=mysql_fetch_array($res);
	$sql="insert into `upload` values(NULL,'$t[c_id]','$filename','$fname')";
	$r=mysql_query($sql);
	if($r)
	  header("location:upload.php?m=uploaded.");
	else
	  header("location:upload.php?m=Not uploaded.");  
}
?>
</body>
</html>