<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
.tab1{
	width:200px;
	height:50px;
	background-color:#69F;
	border-top-left-radius:5px;
	border-top-right-radius:5px;
	float:left;
	margin-right:5px;
}

.tab1 a{
	height:30px;
	width:150px;
	display:block;
	text-decoration:none;
	color:#000;
	line-height:20px;
	text-align:center;
	margin:5px;
}

.content{
	width:608px;
	min-height:200px;
	border:1px solid #69F;
	float:left;
}

h2{
	text-align:center;
}
#tab2{
	display:none;
}
#tab3{
	display:none;
}
</style>

<script>
function change(x)
{
	if(x=="tab1")
	{
		document.getElementById("tab1").style.display="block";
		document.getElementById("tab2").style.display="none";
		document.getElementById("tab3").style.display="none";
		
		document.getElementById("tab_1").style.color="#FFFFFF";
		document.getElementById("tab_2").style.color="#000000";
		document.getElementById("tab_3").style.color="#000000";
	}else if(x=="tab2")
	{
		document.getElementById("tab1").style.display="none";
		document.getElementById("tab2").style.display="block";
		document.getElementById("tab3").style.display="none";
		
		document.getElementById("tab_2").style.color="#FFFFFF";
		document.getElementById("tab_1").style.color="#000000";
		document.getElementById("tab_3").style.color="#000000";
	}
	else if(x=="tab3")
	{
		document.getElementById("tab1").style.display="none";
		document.getElementById("tab2").style.display="none	";
		document.getElementById("tab3").style.display="block";
		
		document.getElementById("tab_3").style.color="#FFFFFF";
		document.getElementById("tab_2").style.color="#000000";
		document.getElementById("tab_1").style.color="#000000";
	}
}

</script>
</head>

<body>
<div style="width:700px;margin:auto;">
<div class="tab1"><a href="javascript:void(0)" onClick="change('tab1')" id="tab_1">How to Register?</a></div><div class="tab1"><a href="javascript:void(0)" onClick="change('tab2')" id="tab_2">How to Login?</a></div><div class="tab1"><a href="javascript:void(0)" onClick="change('tab3')" id="tab_3">How to view the latest courses?</a></div>

<div class="content" style="background-color:#CCF">
	<div id="tab1"><h2>How to Register?</h2>
      <ul type="disc">
        <li>Click on the REGISTER link in the MEMBER'S LOGIN area.</li>
        <li>Fill all the details required in the registration form.</li>
        <li>Please check that you are uploading an image file while uploading your photo.</li>
        <li>Finally click on the register button after you have completed filling the form.</li>
      </ul>
    </div>
    <div id="tab2"><h2>How to Login?</h2>
       <ul type="disc">
        <li>In the MEMBER'S LOGIN area ,enter your full name in the username textbox and password in the password 
            textbox.After that select , student or faculty as required and click on login.
        </li>
      </ul>
    </div>
    <div id="tab3"><h2>How to view the latest courses?</h2>
        <ul type="disc">
        <li>To view the latest courses available, just click on the course name in the latest course area.
            You can view the syllabus of all the latest courses available.
        </li>
      </ul>
    </div>
    <a href="index.php" style="text-decoration:none"><h3 style="text-align:center"><input type="button" value="BACK"></h3></a>
</div>
</div>
</body>
</html>
