<html>
	<head>		
		<title>hostel outing system</title>
		<link rel='stylesheet' type='text/css' href='header1.css'>
		<style>
			body{
				margin:0;
				overflow:hidden;
				background-image: url("white2.jpg");
    			background-repeat: no-repeat;
    			background-size:cover;
    			background-position: center;
			}
			/*#head{
				width:100%;
				background-color:#5B2C6F;
				color:white;
				padding:1%;
				margin:0%;
				text-align:center;
				font-family:"Comic Sans MS", cursive, sans-serif;
				font-size:1.3em;
			}*/
			a{
				text-decoration:none;
				padding:1% 3.5%;
				color:white;
				background-color:#8E44AD;
				border-radius:7%;
				margin-left:0.5em;
				font-size:1.1em;
			}
			a:hover{
				opacity:0.6;
			}
			#left{
				align:center;
				width:100%;
				margin-top:0.2em;
				background-color:#8E44AD;
				padding:1%;
			}
		</style>		
	</head>
	<script>
	var activeElemId;
	function activateItem(elemId,page) {
		document.getElementById(elemId).className="active";
		if(null!=activeElemId&&elemId!=activeElemId) {
			document.getElementById(activeElemId).className="inactive";
		}
		activeElemId=elemId;
		document.getElementById("target").innerHTML="<object type='text/php' data="+page+" style='margin-left:0px; margin-top:0px; margin-right:0px; height:100%; width:100%;'>";
	}
	</script>
	<body onload="activateItem('one','profile.php')">
		<?php
			include("connection.php");
			if(isset($_SESSION['username'])){
                echo $_SESSION['username'];
				header("location: login.php");	
			}
			echo "<div id='head'><h1>Outing Management System</h1></div>";
			/*include("header.php");*/
		?>
		<div id='left'>
		<!--<ul id='menu'>-->

			  <a id ="one" href="#" onclick="activateItem('one','profile.php')">profile</a>
			  <a href="#" id='i10' onclick="activateItem('i10','changepassword.php')">change password</a>
			<?php
                session_start();
				if($_SESSION['access_level']==1){
			?>
			  <a href="#" id='i9' onclick="activateItem('i9','placerequest.php')">Place request</a>
			  <a href="#" id='i3' onclick="activateItem('i3','status.php')">status</a>
			  <a href="#" id='i12' onclick="activateItem('i12','attendance.php')">Attendance</a>			  
			<?php
			}
			?>
			<?php
               
				if($_SESSION['access_level']==2 or $_SESSION['access_level']==4){
			?>
			   <a href="#" id='i2' onclick="activateItem('i2','check1.php')">checkrequest</a> 
			<?php
			}
			?>
			<?php
             
				if($_SESSION['access_level']==3){
			?>
			   <a href="#" id='w' onclick="activateItem('w','outings.php')">outings</a>			  
			<?php
			}
			?>
			   <a href="logout.php" id='i9'>Logout</a>
			<!--</ul>-->
		</div>
		<div id='target'></div>
	</body>
</html>