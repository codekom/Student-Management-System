<?php
  include "connect.php";
  session_start();
   $sql="select * from `admin`";
   $res=mysql_query($sql);

  if(isset($_POST['login']))
  {
	  extract($_POST);
	  $t=mysql_fetch_array($res);
	  if($t['ad_username']==$name && $t['ad_password']==$psw)
	  {
		  $_SESSION['user']=$name;
	    header("location:index.php?msg=y");
	  }
	  else
	   header("location:login.php?msg=Invalid username or password");
  }
  
 // logout code
 
 if(isset($_GET['log']))
 {
 unset($_SESSION['user']);
 header("location:login.php?msg=Logged out Successfully");
 
 }
 // change password code
  if(isset($_GET['cp']))
  {
  ?>
  <form action="process.php" method="post">
  <div style="width:500px;border:1px solid #000;height:200px;margin:auto;background-color:#FF9;">
  <table width="500">
  <tr>
    <td colspan="2" align="center"><h2>Change Password</h2></td>
  </tr>  
  <tr>
    <td width="200">Enter old password</td>
    <td><input type="password" name="p1" size="30"></td>
  </tr>
  <tr>
    <td width="200">Enter new Password</td>
    <td><input type="password" name="p2" size="30"></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><br><input type="submit" value="submit" name="sbmt">
                                     <a href="index.php" style="text-decoration:none"><input type="button" value="back"></a> 
    </td>
  </tr> 
  </table>
  </div>
  </form>  
  <?php
  }
  if(isset($_POST['sbmt']))
  {
	  extract($_POST);
	  $sql="update `admin` set `ad_password`='$p2' where `ad_password`='$p1'";
	  $r=mysql_query($sql);
	  if($r)
	  {
		header("location:login.php?msg=Password updated.");
	  }
  }
  // delete course code
  if(isset($_GET['d_id']))
  {
	  $id=$_GET['d_id'];
	  $sql="delete from `course` where `c_id`='$id'";
	  $r=mysql_query($sql);
	  if($r)
	    header("location:course.php?msg=Course deleted successfully.");
	  else
	    header("location:course.php?msg=Course could not be deleted.");
  }
  // edit course code
  if(isset($_POST['sbmt2']))
   {
	   extract($_POST);
	   $sql="update `course` set `c_name`='$nm',`c_desc`='$msg',`c_dur`='$dur' where `c_id`='$ccid'";
	   $res=mysql_query($sql);
	   if($res)
	      header("location:course.php?msg=Course edited successfully.");
	   else
	     header("location:course.php?msg=Course could not be edited.");	 	 
   }
   // edit student details
   if(isset($_POST['sbmt3']))
   {
	   extract($_POST);
	   $a="select `c_id` from `course` where `c_id`='$course'";
	   $b=mysql_query($a);
	   $c=mysql_fetch_array($b);
	   $w="update `student` set `password`='$pw',`cid`='$c[c_id]' where `s_id`='$ssid'";
	   $res=mysql_query($w);
	   if($res)
	     header("location:student_details.php?sg=Updated successfully.");
	   else
	     header("location:student_details.php?sg=Not updated.");	 
   }
   // delete student details
   if(isset($_GET['del_id']))
   {
	  $id=$_GET['del_id'];
	  $sql="delete from `student` where `s_id`='$id'";
	  $s="delete from `result` where `student_id`='$id'";
	  $r=mysql_query($sql);
	  $r2=mysql_query($s);
	  if($r)
	    header("location:student_details.php?sg=Student details deleted successfully.");
	  else
	    header("location:student_details.php?sg=Details could not be deleted.");
   }
   // approve disapprove student code
   if(isset($_GET['ap']))
   {
	   $id=$_GET['ap'];
	   if($_GET['st']==1)
	     $sql="update `student` set `status`=0 where `s_id`='$id'";
	   else if($_GET['st']==0)
	     $sql="update `student` set `status`=1 where `s_id`='$id'";
	  $r=mysql_query($sql);
	  if($r)
	    header("location:student_details.php");
   }
   // delete result code
   if(isset($_GET['dl_id']))
   {
	   $id=$_GET['dl_id'];
	   $s="delete from `result` where `student_id`='$id'";
	   $r2=mysql_query($s);
	   if($r2)
	     header("location:admin_result.php?msg=Result deleted.");
	   else
	     header("location:admin_result.php?msg=Result could not be deleted.");
   }
   // deleted uploaded file code
   if(isset($_GET['delf']))
   {
	   $id=$_GET['delf'];
	   $s="delete from `upload` where `u_id`='$id'";
	   $r2=mysql_query($s);
	   if($r2)
	     header("location:view.php?msg=File deleted.");
	   else
	     header("location:view.php?msg=File could not be deleted.");
   }
   // upload news code
   if(isset($_POST['nw']))
  {
	  extract($_POST);
	  $filename=$_FILES['upl']['name'];
	  if(!empty($filename))
	  {
	    $ext=explode(".",$filename);
	    $ext=end($ext);
	    if($ext=="ppt"||$ext=="doc"||$ext=="txt"|| $ext=="docx"|| $ext=="pdf")
	    {
	   	   $filename="news/".$filename;
		   if(!copy($_FILES['upl']['tmp_name'],$filename))
		      header("location:upload_news.php?k=file could not be uploaded");	 
	    }
		else
		{
             header("location:upload_news.php?k=File type not supported");
   		}
	  }
      $sql="insert into `news` values('$filename',NULL,'$n')";
      $r=mysql_query($sql);
	  if($r)
	    header("location:upload_news.php?k=File uploaded");
      else
	    header("location:upload_news.php?k=File could not be uploaded");	
  }
  // edit news code
   if(isset($_POST['editnw']))
  {
	  extract($_POST);
	  $filename=$_FILES['upl']['name'];
	  if(!empty($filename))
	  {
	    $ext=explode(".",$filename);
	    $ext=end($ext);
	    if($ext=="pptx"||$ext=="doc"||$ext=="txt"|| $ext=="docx"|| $ext=="pdf")
	    {
	   	   $filename="news/".$filename;
		   if(!copy($_FILES['upl']['tmp_name'],$filename))
		      header("location:edit_news.php?k=file could not be uploaded");	 
	    }
		else
		{
             header("location:edit_news.php?k=File type not supported");
   		}
	  }
      $sql="update `news` set `filePath`='$filename' where `topic`='$n'";
      $r=mysql_query($sql);
	  if($r)
	    header("location:edit_news.php?k=File uploaded");
      else
	    header("location:edit_news.php?k=File could not be uploaded");	
  }
  ?>
