<?php
  session_start();
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
.main{
	width:300px;
	float:left;
	margin:auto;
	margin:50px 10px;
	border-radius:5px;
}
h2{
	text-align:center;
	background-color:#666;
	padding:0px;
	margin:0px;
}
h1{
	text-align:center;
	margin:0px;
	letter-spacing:5px;
}
font{
	padding-left:15px;
}
a:hover{
	color:#000000;
    font-size:15px;
}
body{
	background-color:#999;}
font{
	font-weight:200;	
}
p{
	line-height:30px;
	text-height:30px;
	font-family:Consolas, "Andale Mono", "Lucida Console", "Lucida Sans Typewriter", Monaco, "Courier New", monospace;
	margin:10px;
}
</style>
</head>

<body>
<table width="100%" border="0">
<tr height="200" style="background-image:url(images/study.jpg)">
  <td colspan="2" valign="top">
  <h1><font font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;>STUDENT MANAGEMENT SYSTEM</font></h1></td>
</tr>
<tr>
  <td width="400">
      <div class="main"><h2>LOGIN</h2>
      <?php
	  if(!isset($_SESSION['suser']))
	  {
	  ?>
      <table border="0" width="100%" bgcolor="#669966">
       <form action="process.php" method="post">
	   <tr>
	      <td width="100"><font size="5">Username</font></td>
		  <td><input type="text" size="20" placeholder="your full name here" name="unm"></td>
		</tr>
        <tr>
	      <td width="100"><font size="5">Password</font></td>
		  <td><input type="password" size="20" placeholder="password" name="pw"></td>
		</tr>
        <tr>
	      <td colspan="2" style="text-align:center"><input type="radio" name="sf" value="Student">Student
                          <input type="radio" name="sf" value="Faculty">Faculty</td>
		</tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="loginf" value="LOGIN"></td>
        </tr>
        <tr>
           <td colspan="2"><a href="register.php" title="click here to register">REGISTER</a></td>
        </tr>  
        <tr>
           <td colspan="2">
             <?php if(isset($_GET['msg'])) echo $_GET['msg'];?>
           </td>
        </tr> 
       </form>     
      </table>
      <?php
	  }else
	  {
		  $id=$_SESSION['sid'];
		?>
        <h2>Student Area</h2>
        <img src="admin/<?=$_SESSION['photo']?>" height="100" width="100">
         <?php
           echo "<h3 style=\"margin-top:0px;padding-top:30px\">NAME&nbsp;:&nbsp;$_SESSION[suser]</h3>";
           echo "<h3>".date('d-M-Y')."</h3>";
		?>
        <ul type="square">
       <li><?php echo "<a href=\"student_profile.php?slid=$id&w=e\">Edit Profile</a>"; ?></li><br>
  		<li><?php echo "<a href=\"student_profile.php?slid=$id&x=e\">View Result</a>"; ?></li><br>
  		<li><?php echo "<a href=\"student_profile.php?slid=$id&y=e\">Download</a>"; ?></li><br>
        <li><a href="process.php?log=n">Log out</a></li>
       </ul>
	  
	  <?php
      }
	  ?>
     </div>
     <div class="main" style="background-color:#669966">
     <h2>Latest Courses</h2>
       <ul type="square">
       <?php
	      while($row=mysql_fetch_array($result))
		  {
                echo "<li><a href=\"course_details.php?id=$row[c_id]\">".$row['c_name']."</a></li>";
		  }
		  ?>
       </ul>
     </div>
   </td>
   <td>
      <div class="main" style="background-color:#666;height:500px;width:800px;">
         <?php
		     if(isset($_GET['id']))
			 {
				$r=$_GET['id'];
			    $sql="select `c_desc`,`c_name` from `course` where `c_id`='$r'";
			    $resl=mysql_query($sql);
                $p=mysql_fetch_array($resl);
				echo "<h2 style=\"margin-top:10px\">".$p['c_name']."</h2>";
				echo "<p>".$p['c_desc']."</p>";
			 }
			 else
			   echo "<h1>Click on the course name to get its description.</h1>"
		 ?>
        </div>
      </td>
   </tr>
   </table>
  </body>
 </html>        
         
				