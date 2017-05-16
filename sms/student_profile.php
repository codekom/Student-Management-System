<?php
  include "connect.php";
  session_start();
  if(!isset($_SESSION['suser']))
  {
	  header("location:phome.php?msg=Please login");
  }
  if(isset($_GET['slid']))
  {
      $id=$_GET['slid'];
      $sql="select * from `student` where `s_id`='$id'";
      $res=mysql_query($sql);
	  $v=mysql_fetch_array($res);
	  $sql2="select `c_name` from `course` where `c_id`='$v[cid]'";
	  $r=mysql_query($sql2);
	  $row2=mysql_fetch_array($r);
  }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
.main
{
	width:100%;
	background-color:#F9F9F9;
	height:165px;
	margin-bottom:0px;
}
img{
	float:left;
	padding-right:20px;
}
ul
{
	float:left;
	margin-right:100px;
}
fieldset
{
	width:700px;
}
td{
	text-align:center;
	height:50px;
}
font
{
	font-size:25px;
}
a{
	text-decoration:none;
}
</style>
</head>

<body>
<div class="main">
<?php
   echo "<img src=$v[photo] height=\"150\" width=\"150\">";
   echo "<h3 style=\"margin-top:0px;padding-top:30px\">NAME&nbsp;:&nbsp;$v[s_name]</h3>";
   echo "<h3>".date('d-M-Y')."</h3>";
?>
<h3 style="padding-left:1275px;padding-top:20px;"><a href="index.php">Back</a></h3>
</div>
<div class="main" style="height:475px">
<ul>
  <br><li><?php echo "<a href=\"student_profile.php?slid=$id&w=e\">Edit Profile</a>"; ?></li><br>
  <li><?php echo "<a href=\"student_profile.php?slid=$id&x=e\">View Result</a>"; ?></li><br>
  <li><?php echo "<a href=\"student_profile.php?slid=$id&y=e\">Download</a>"; ?></li>
</ul>
<br><br><br><br>
<?php
 if(isset($_GET['w']))
 {
?>
<fieldset>
<legend>Your profile</legend>
  <form action="process.php" method="post" enctype="multipart/form-data">
   <table width="700">
    <tr>
      <td width="200">Name*</td>
      <td><input type="text" name="name" size="30" value="<?=$v['s_name']?>" readonly></td>
    </tr>
    <tr>
      <td width="200">email</td>
      <td><input type="text" name="email" size="30" value="<?=$v['s_email']?>"></td>
    </tr>
    <tr>
      <td width="200">Phone no</td>
      <td><input type="text" name="phn" size="30" value="<?=$v['s_phone']?>"></td>
    </tr>
    <tr>
      <td width="200">Change photo</td>
      <td><input type="file" name="cph" size="30"></td>
    </tr>
    <tr>
      <td width="200">Course*</td>
      <td><input type="text" name="course" size="30" value="<?=$row2['c_name']?>" readonly></td>
    </tr> 
    <tr>
    <td colspan="2" align="center"><br><input type="submit" value="Change" name="sbmt4" style="border:none">&nbsp;
          <input type="reset" value="cancel" name="cancel" style="border:none">
          <input type="hidden" value="<?=$v['s_id']?>" name="ssid">
    </td>
    </tr>     
   </table>
  </form> 
  <font>*Can't be changed</font>
</fieldset> 
<?php
 }
  if(isset($_GET['mssg']))
	{
		echo $_GET['mssg'];
	}
?>
<?php
 if(isset($_GET['x']))
 {
	 $p="select * from `result` where `student_id`='$id'";
	 $q=mysql_query($p);
	 $z=mysql_fetch_array($q);
	 $a="select * from `course` where `c_id`='$z[course_id]'";
	 $b=mysql_query($a);
	 $c=mysql_fetch_array($b);
?>
<fieldset>
<legend>Your Results</legend>
  <form action="process.php" method="post">
   <table width="700">
    <tr>
      <td width="200">Course</td>
      <td><input type="text" name="name" size="30" value="<?=$c['c_name']?>" readonly></td>
    </tr>
    <tr>
      <td width="200">Course Duration</td>
      <td><input type="text" name="name" size="30" value="<?=$c['c_dur']?>" readonly></td>
    </tr>
    <tr>
      <td width="200">Name</td>
      <td><input type="text" name="name" size="30" value="<?=$v['s_name']?>" readonly></td>
    </tr>
    <tr>
      <td width="200">Full marks</td>
      <td><input type="text" name="fm" size="30" value="<?=$z['fullmarks']?>" readonly></td>
    </tr>
    <tr>
      <td width="200">Marks obtained</td>
      <td><input type="text" name="phn" size="30" value="<?=$z['marks_obt']?>" readonly></td>
    </tr>
    <tr>
      <td width="200">Grade</td>
      <td><input type="text" name="course" size="30" value="<?=$z['grade']?>" readonly></td>
    </tr>     
   </table>
  </form> 
</fieldset> 
<?php
 }
 if(isset($_GET['y']))
 {
	 $p="select * from `student` where `s_id`='$id'";
	 $q=mysql_query($p);
	 $z=mysql_fetch_array($q);
	 $a="select * from `upload` where `crs_id`='$z[cid]'";
	 $b=mysql_query($a);
?>
<fieldset>
  <legend><font>You may download</font></legend>
  <ul>
  <?php
    while($c=mysql_fetch_array($b))
	{
		$file_path="admin/$c[file_path]";
		 echo "<br><li><font><a href=\"$file_path\">$c[file_title]</a></font></li>";
	}
  ?>
  </ul>
</fieldset>
<?php
 }
 ?>
</div> 
</body>
</html>