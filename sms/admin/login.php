<?php
  include "connect.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
body
{
	background-color:#90C;
}
.mydiv
{
	width:300px;
	border:solid 2px #000;
	border-radius:10px;
	margin:auto;
	margin-top:80px;
    box-shadow:7px 5px 10px;
	background-color:#90C;
	height:500px;
}
h3{
	text-align:center;
	font:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
	height:45px;
}
h1{
	border-bottom:2px solid #000;
	text-align:center;
	height:100px;
	line-height:70px;
}
input{
	border:2px solid #000;
	font-size:20px;
	border-radius:5px;
}

.error{
	color:#F00;
	font-size:16px;
	font-style:italic;
	text-align:center;
}
</style>
</head>

<body>
<form action="process.php" method="post">
<div class="mydiv">
<h1>Admin Login</h1>
<h3>USERNAME</h3>
<h3><input type="text" name="name" placeholder="username"></h3>
<h3>PASSWORD</h3>
<h3><input type="password" name="psw" placeholder="password" ></h3>
<h3><input type="submit" style="border:none;border-radius:0px;" value="login" name="login"></h3>

<div class="error"><?php if(isset($_GET['msg'])) echo $_GET['msg'];?></div>
</div> 
</form>
</body>
</html>