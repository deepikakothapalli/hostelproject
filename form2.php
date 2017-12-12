<?php
    include "connection.php";
    if(isset($_POST["username"]))
        $regno=$_POST["username"];
    if(isset($_POST["password"]))
        $password=$_POST["password"];
    $access=mysqli_query($connect,"select access_level from details where username='$regno'");
    $access1=mysqli_fetch_array($access);
    $user=mysqli_query($connect,"select username from details where username='$regno'");
    $user1=mysqli_fetch_array($user);
    $count=mysqli_num_rows($user);   
    if($count==0)
    {
        echo "<br><br><center><h1>Invalid username .......</h1></center>";
        echo "<center><img src='images.jpg'/></center>";
        header("refresh:3;url=login.html");
    }
    else
    {
        session_start();
        $_SESSION['username']=$regno;
        $_SESSION['access_level']=$access1['access_level'];
        $result=mysqli_query($connect,"select * from details where username='$regno'");
        $val=mysqli_fetch_array($result);
        $row= $val['password'];
        if($password==$row)
        {
            echo "login successful";
            header("refresh:0;url=display.php");
            
        }
        else
        {
            echo "<center><h1>Incorrect password....</h1></center>";
            echo "<center><img src='images.jpg'/></center>";
           header("refresh:3;url=login.html");
        }
    }
            
?>