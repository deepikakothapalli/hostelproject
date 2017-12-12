<!DOCTYPE html>
<?php
include "connection.php";
session_start();
$error=" ";
if (isset($_POST['submit'])) {
	$user=$_SESSION['username'];
	$result=mysqli_query($connect,"select * from details where username='$user'");
	$res=mysqli_fetch_array($result);
	if($res['password']!=$_POST['cpassword']){
		$error="<font color='red'>Invalid current password</font>";
	}
	else if($_POST['npassword']!=$_POST['rnpassword']){
		$error="<font color='red'>New password and retyped password not matching</font>";
	}
	else{
		$pass=$_POST['npassword'];
		mysqli_query($connect,"update details set password='$pass' where username='$user'");
		$error="<font color='green'>Password updated successfully</font>";
	}
}
?>
<html>
	<head>
		<style>
			body{
				/*font-family:calibri;*/
				font-size:20px;
				font-family:"Comic Sans MS", cursive, sans-serif;
			}
			input[type=password] {
				width:100%;
				border:2px solid black;			
				font-size:20px;			
				border-radius:5px;			
			}
			input[type=submit] {
				width:100%;
				background-color:#5B2C6F;
				color:white;
				border:2px solid #5B2C6F;
				padding:10px;
				font-size:20px;
				cursor:pointer;
				border-radius:5px;
				margin-bottom:15px
			}
			table{
				padding:10px;
			}
		</style>
		<script>
			function setfocus(){
				document.MyForm.cpassword.focus();
			}
		</script>
	</head>
	<body onload='setfocus()'>
		<table align='center' cellpadding='5px'>
			<tr><td  colspan='3' align='center'><hr><b>Change Password</b><hr></td></tr>
			<tr><td>Username</td><td>:</td><td><?php echo $_SESSION['username'];?></td></tr>
			<form method='post' name='MyForm'>				
				<tr><td>Current password</td><td>:</td><td><input type='password' name='cpassword' required></td></tr>
				<tr><td>New password</td><td>:</td><td><input type='password' name='npassword' required></td></tr>
				<tr><td>Retype new password</td><td>:</td><td><input type='password' name='rnpassword' required></td></tr>
				<tr><td></td><td></td><td align='right'><br><input type='submit' name='submit' value='submit'></td></tr>
			</form>
			<tr><td colspan='3' align='center'><?php echo $error;?></td></tr>
		</table>
	<body>
</html>