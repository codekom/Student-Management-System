<?php
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
.main
{
	margin:auto;
	margin-top:25px;
	border-radius:20px;
	width:500px;
	box-shadow:8px 7px 9px;
} 
h1
{
	text-align:center;
	background-color: #55F;
	margin:0px;
	padding:0px;
	height:55px;
	border-top-left-radius:10px;
	border-top-right-radius:10px;	
}
body
{
	background-color:#EBEBEB;
}
td
{ 
  text-align:center;
  height:60px;
}
a
{
	color:#181818;
}
</style>
<script>
function mycaptcha()
{
	x=(Math.floor(Math.random()*10)+1);
	y=(Math.floor(Math.random()*10)+1);
	a=x+"+"+y;
	z=x+y;
	document.getElementById("xyz").innerHTML=a;
}

function check()
{
n=parseInt(document.getElementById("code").value);
	if(n!=z)
	{
	  alert("captcha code mismatch");
	return false;
	}
}
</script>
</head>

<body onLoad="mycaptcha()">
<form action="mail.php" method="post" onSubmit="return check();">
<div class="main">
<h1>CONTACT</h1>
<table width="500" bgcolor="#FEFEFE" height="400">   
 <tr>
    <td width="200">Name</td>
    <td><input type="text" name="name" size="30" required></td>
 </tr>
 <tr>
    <td width="200">phone no.</td>
    <td><input type="text" name="phone" size="30" required></td>
 </tr>
 <tr>
    <td width="200">email</td>
    <td><input type="text" name="email" size="30" required></td>
 </tr>
 <tr>
    <td width="200">Message</td>
    <td><textarea rows=6 cols=30 name="msg" required></textarea></td>
 </tr>
 <tr>
    <td width="200">Security Code<br><a href="javascript:void(0)" onClick="mycaptcha()">Change</a></td>
    <td><div id="xyz"></div><input type="text" name="code" size="30" id="code" required></td>
 </tr>    
 <tr>
    <td colspan="2" align="center"><br><input type="submit" value="submit" name="submit">
          <input type="reset" value="cancel" name="cancel">
          <a href="index.php" style="text-decoration:none"><input type="button" size="20" value="Back"></a>
    </td>
 </tr>  
 <tr>
   <td colspan="2" align="center" style="height:40px">
    </td>
  </tr>   	       
</table>
</form>	
</div>
</body>
</html>