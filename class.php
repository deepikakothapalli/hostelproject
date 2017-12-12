<?php
    echo "hi...";
    include("connection.php");
    session_start();
    $_SESSION['text']="";
    $regd=$_GET['roll'];
    $_SESSION['emailid']=$regd;
    $_SESSION['text']="Your request is accepted. Happy Journey!!!!!";
    $user=$_SESSION['username'];
    $_SESSION['id']=$regd;
    date_default_timezone_set('Asia/Kolkata');
    $dt= date('Y-m-d');
    $access=mysqli_query($connect,"SELECT access_level FROM details WHERE username='$user'");
    $access1=mysqli_fetch_array($access);
    $connect1=mysqli_connect("localhost:3306","root","","studentsrequests");
    if(!mysqli_select_db($connect1,'studentsrequests'))
        echo "Database not selected";
    $user1=mysqli_query($connect1,"SELECT * from faculty WHERE username='$user'");
    $coun=mysqli_fetch_array($user1);
    $teach=mysqli_query($connect1,"SELECT * FROM students where regd='$regd'");
    $teacher=mysqli_fetch_array($teach);
    $req=mysqli_query($connect1,"SELECT * from requests where regdno='$regd'");
    $req1=mysqli_fetch_array($req);
    $em=mysqli_query($connect1,"SELECT * from faculty where name='$req1[classteacher]'");
    $em1=mysqli_fetch_array($em);
    $final=mysqli_query($connect1,"SELECT * from faculty where username=(select username from details where access_level=4)");
    if($final)
        $count=mysqli_num_rows($final);
   // echo $count;
    if($teacher['counsellor']==$coun['name'])
    {
        if($teacher['counsellor']==$teacher['classteacher'])
        {
             mysqli_query($connect1,"UPDATE requests SET teacherstatus='Accepted' WHERE regdno='$regd'");
             mysqli_query($connect1,"UPDATE status SET classteacher='Accepted' WHERE regdno='$regd'");
             $_SESSION['email']=$final11['emailid'];
             include("vendor/index1.php");
             for($i=0;$i<$count;$i++)
             {
                $final1=mysqli_fetch_array($final);
                $_SESSION['phone']=$final1['phoneno'];
                include("phpsample1.php");
             }

        }
        else{
            $_SESSION['email']=$em1['emailid'];
                include("vendor/index1.php");
            $_SESSION['phone']=$em1['phoneno'];
            include("phpsample1.php");
        }
        echo 'hi';
        mysqli_query($connect1,"UPDATE requests SET counsellorstatus='Accepted' WHERE regdno='$regd'");
        mysqli_query($connect1,"UPDATE status SET counsellor='Accepted' WHERE regdno='$regd'");
    }
    else if($access1['access_level']==4)
    {
         mysqli_query($connect1,"UPDATE status SET hod='Accepted' WHERE regdno='$regd'");
         mysqli_query($connect1,"UPDATE requests SET hodstatus='Accepted' WHERE regdno='$regd'");
    }
    else
    {
        //$_SESSION['email']=$final11['emailid'];
        //include("vendor/index1.php");
        for($i=0;$i<$count;$i++)
        {
                $final1=mysqli_fetch_array($final);
                $_SESSION['phone']=$final1['phoneno'];
                //include("phpsample1.php");
        }
        mysqli_query($connect1,"UPDATE requests SET teacherstatus='Accepted' WHERE regdno='$regd'");
        mysqli_query($connect1,"UPDATE status SET classteacher='Accepted' WHERE regdno='$regd'");
    }
    echo $teacher['classteacher'];
    $res=mysqli_query($connect1,"SELECT * FROM requests where regdno='$regd' and dat='$dt'");
    $res1=mysqli_fetch_array($res);
    if($res){
        echo "Hello";
        if($res1['counsellorstatus']=='Accepted' and  $res1['teacherstatus']=='Accepted' and $res1['hodstatus']=='stillpending')
        {  
            echo "hi";     
            mysqli_query($connect1,"INSERT INTO hod  (`regdno`, `dat`, `reason`, `fromdate`, `todate`, `state`, `studentno`, `guardianno`) VALUES('$regd', '$res1[dat]', '$res1[reason]', '$res1[fromdate]', '$res1[todate]', 'stillpending', '$res1[studentno]', '$res1[guardianno]')");
        }
    }
    
    if($res1['counsellorstatus']=='Accepted' and  $res1['teacherstatus']=='Accepted' and $res1['hodstatus']=='Accepted')
    {
        $_SESSION['sms']="Your child ".$teacher['name']." request for outing has been accepted.";
       $_SESSION['parent']=$teacher['parentno'];
        //include("PHPsample.php");
        $_SESSION['number']=$teacher['studentno'];
        include('phpsample2.php');
        header('Location:vendor/index.php');
    }
        
       // $val=mysqli_query($connect1,"SELECT * FROM `requests` WHERE regdno='$regd' and dat='$dt'");
       // $val1=mysqli_fetch_array($val);
        //if(strcmp($teacher['classteacher'],$coun['name'])!==0){
          //  if(!mysqli_query($connect1,"INSERT INTO `{$teacher['classteacher']}` (`regdno`, `dat`, `reason`, `fromdate`, `todate`, `state`, `studentno`, `guardianno`) VALUES ('$regd', '$val1[dat]', '$val1[reason]', '$val1[fromdate]', '$val1[todate]', 'stillpending', '$val1[studentno]', '$val1[guardianno]') "))
            //    echo "Not inserted";
       // }
        //else
        //{
            //$class=mysqli_query($connect1,"SELECT * ")
            
        //}
    //}
    //header("Location:checkrequest.php");
?>