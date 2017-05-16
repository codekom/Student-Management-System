<?php
  include "connect.php";
  // code for student registration
   if(isset($_POST['register']))
   {
	   extract($_POST);
	   if(empty($name))
	     header("location:register.php?mg1=This field is required");
	   else if(empty($email))
	     header("location:register.php?mg2=This field is required");
	   else if(empty($phone))
	     header("location:register.php?mg3=This field is required");
	   else if(empty($course))
	     header("location:register.php?mg4=This field is required");
	   else if(empty($psw))
	     header("location:register.php?mg5=This field is required");
	   else if(empty($psw2))
	     header("location:register.php?mg6=This field is required");
	   else if($psw!=$psw2)
	     header("location:register.php?mg7=Passwords do not match");
	   else
	   {	 	 	 	 	 	 	 
	   $filename=$_FILES['pic']['name'];
	   if(!empty($filename))
	   {
	      $ext=explode(".",$filename);
	      $ext=end($ext);
		  
	      if($ext=="jpg"||$ext=="png"||$ext=="gif")
	      {
			  $filename="images/".$filename;
		     if(!copy($_FILES['pic']['tmp_name'],$filename))
		        header("location:register.php?m=File could not be uploaded.");	 
	      }
	      else
          {
	        header("location:register.php?m=Not an image file.");
	      }
	   }
	   else
	     $filename="images/study.jpg";
	   $s="select `c_id` from `course` where `c_id`='$course'"; 
	   $res=mysql_query($s);
	   $t=mysql_fetch_array($res);
	   $sql="insert into `student` values(NULL,'$t[c_id]','$name','$email','$phone','$psw','$filename',0)";
	   $res=mysql_query($sql);
	   if($res)
	     header("location:register.php?m=You have registered successfully");
	   else
	     header("location:register.php?m=Not registered.");	 
	   }
   }
   // code for student login
   session_start();
   if(isset($_POST['loginf']))
   {
	   $x=0;
		extract($_POST);
	    $sql="select * from `student`";
		$res=mysql_query($sql);
		while($row=mysql_fetch_array($res))
		{
			if($row['s_name']==$unm&&$row['password']==$pw&&$sf=="Student")
			{
				$x=1;
				if($row['status']==1)
				{
				  $_SESSION['suser']=$row['s_name'];
				  $_SESSION['photo']=$row['photo'];
				  $_SESSION['sid']=$row['s_id'];
			      header("location:index.php?msg=Login Successfully");
				}
				else
				{
					header("location:index.php?msg=You are not approved.");
				}
			}
		}
		if($x==0)
		 header("location:index.php?msg=Invalid username or password.");
		
    }
	// code for student log out
	if(isset($_GET['log']))
	{
		unset($_SESSION['suser']);
		unset($_SESSION['photo']);
		unset($_SESSION['s_id']);
		header("location:index.php?msg=logged out");
	}
	// code for editing student profile 
	if(isset($_POST['sbmt4']))
	{
		extract($_POST);
		$filename=$_FILES['cph']['name'];
		if(!empty($filename))
	   {
	    $ext=explode(".",$filename);
	    $ext=end($ext);
	    if($ext=="jpg"||$ext=="png"||$ext=="gif")
	    {
	   	   $filename="images/".$filename;
		   if(!copy($_FILES['cph']['tmp_name'],$filename))
		      header("location:student_profile.php?k=file could not be uploaded");	 
	    }
		else
		{
             header("location:student_profile.php?k=File type not supported");
   		}
	   }
		$sql="update `student` set `s_email`='$email',`s_phone`='$phn',`photo`='$filename' where `s_id`='$ssid'";
		$res=mysql_query($sql);
		if($res)
		{   $_SESSION['photo']=$filename;
		    header("location:student_profile.php?slid=$ssid&mssg=UPDATED");
		}
		else
		  header("location:student_profile.php?mssg=Could not be updated");
	}
   ?>
