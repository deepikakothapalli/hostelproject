<?php
    
    include "connection.php";
    if(!mysqli_select_db($connect,'hostel'))
        echo "Database not selected";
    if(isset($_POST["username"]))
        $regno=$_POST["username"];
    else
        echo "unsuccessful";
    if(isset($_POST["password"]))
        $password=$_POST["password"];
    $user=mysqli_query($connect,"select * from details where username='$regno'");
    $count=mysqli_num_rows($user);   
    if($count===0)
    {
        echo "<br><br><center><h1>Invalid username .......</h1></center>";
      /*  echo "<center><img src='images.jpg'/></center>";
        header("refresh:3;url=login.html");*/
    }
    else
    {
        $result=mysqli_query($connect,"select * from details where username='$regno'");
        $val=mysqli_fetch_array($result);
        $row= $val['password'];
        session_start();
        $_SESSION['username']=$val['username'];
        $_SESSION['access_level']=$val['access_level'];
        if($password==$row){
            echo "Login Successful";    
            header("Location:display.php");

        }
        else
        {
            echo "<center><h1>Incorrect password....</h1></center>";
            echo "<center><img src='images.jpg'/></center>";
         /*   header("refresh:3;url=login.html");
        */}
    }
            
?>