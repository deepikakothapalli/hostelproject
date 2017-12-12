<?php
	session_start();	
if($_SESSION['username'])
{
		header('location:appear.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>hostel page</title>
        <link rel="stylesheet" href="login.css">
         <meta charset="utf-8">
    </head>
		<script>
			function setfocus(){
				document.myform.username.focus();
			}
		</script>
    <body onload="focus()">
     <div class="main">
				<div class="panel">
					<h1>Hostel Portal</h1><br>
				  <form name="myform" action="form1.php" method="post" onsubmit="return validation()">
					<input id="user" type="text" name="username" placeholder="Regno">
					<input id ="password" type="password" name="password" placeholder="Password">
					<input type="submit" name="login" class="login loginmodal-submit" value="Login" >
				  </form>
					<!--<a href="#">Register</a>-->
			</div>
			</div>
	    </div>
    </body>
</html>