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
	margin:10px;
	border-radius:20px;
}
h2{
	text-align:center;
	background-color:#666;
	padding:0px;
	margin:10px 10px;
	margin:auto;
}
.notice{
	width:600px;
	background-color:#669966;
	color:#000;
	margin-top:0px;
	height:365px;
	border-radius:20px;
	margin-right:30px;
}

.notice h1{
	margin:0px;
	padding:0px;
	width:98.5%;
	background-color:#666;
	font-weight:normal;
	font-size:24px;
	padding-left:10px;
}

.notice ul li{
	padding:5px;
}

.notice ul li a{
	text-decoration:none;
}

.notice ul li a:hover{
	text-decoration:underline;
	color:#000;
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
	font-weight:500;	
}
img{
	float:left;
	padding-right:20px;
}
</style>
</head>

<body>
<table width="100%" border="0">
<tr height="200" style="background-image:url(images/study.jpg)">
  <td colspan="3" valign="top">
  <h1><font font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;>STUDENT MANAGEMENT SYSTEM</font></h1></td>
</tr>
<tr>
  <td width="400">
      <div class="main" style="background-color:#669966">
      <?php
	  if(!isset($_SESSION['suser']))
	  {
	  ?>
      <table border="0" width="100%" bgcolor="#669966">
      <form action="process.php" method="post">
       <tr>
         <td colspan="2"><h2>MEMBER'S LOGIN</h2></td>
       </tr>  
	   <tr>
	      <td width="100"><font size="5">Username</font></td>
		  <td><input type="text" size="20" placeholder="your full name here" name="unm" required></td>
		</tr>
        <tr>
	      <td width="100"><font size="5">Password</font></td>
		  <td><input type="password" size="20" placeholder="password" name="pw" required></td>
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
             <?php 
			   if(isset($_GET['msg']))
			     echo $_GET['msg'];
             ?>
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
        <img src="<?=$_SESSION['photo']?>" height="100" width="100">
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
                echo "<li><a href=\"course_details.php?\">".$row['c_name']."</a></li>";
		  }
		  ?>
       </ul>
     </div>
   </td>
   <td>
       <div class="notice" >
	   <h1>NOTICE</h1>
       <marquee direction="up" scrolldelay="170" scrollamount="5" onMouseOver="this.setAttribute('scrollamount',0,0)" onMouseOut="this.setAttribute('scrollamount',6,0)">
       <?php
	     $sql="select * from `news`";
		 $rs=mysql_query($sql);
         echo "<ul>";
	     while($p=mysql_fetch_array($rs))
		 {
			 $c="admin/$p[filePath]";
    	     echo "<li><a href=\"$c\">$p[topic]</a></li>";
		 }
		 ?>
       </ul>
      </marquee>
      </div>
    </td>
    <td width="400">
    <div class="main" style="background-color:#669966">
    <h2>FAQs</h2>
     <ul type="circle">
       <li><a href="faq.php">How to Register?</a></li>
       <li><a href="faq.php">How to Login?</a></li>
       <li><a href="faq.php">How to view the latest courses?</a></li>
     </ul> 
    </div>
    <div class="main" style="background-color:#669966">
    <h2>Course Toppers</h2>
    <table>
    <tr>
      <td width="200" style="padding-left:10px">Artificial Intelligence</td>
      <td>Kajal</td>
    </tr>
    <tr>
      <td width="200" style="padding-left:10px">Cryptography</td>
      <td>Revati</td>
    </tr>
    <tr>
      <td width="200" style="padding-left:10px">Operating System</td>
      <td>Komal</td>
    </tr>
    <tr>
      <td width="200" style="padding-left:10px">Multimedia</td>
      <td>Shubham</td>
    </tr>
    <tr>
      <td width="200" style="padding-left:10px">System Software</td>
      <td>Devraj</td>
    </tr>
    <tr>
      <td width="200" style="padding-left:10px">Algorithms</td>
      <td>Abhilasha</td>
    </tr>
    <tr>
      <td width="200" style="padding-left:10px">DBMS</td>
      <td>Akul</td>
    </tr>
    <tr>
      <td width="200" style="padding-left:10px">Software Engineering</td>
      <td>Moni</td>
    </tr>
    </table> 
    </div>
    </td>
  </tr>
</table> 
<div class="main" style="background-color:#669966;width:99%;">
    <h2><a href="contact.php" style="color:#000">CONTACT</a></h2>
    </div> 
</body>
</html>