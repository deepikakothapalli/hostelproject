<?php
    include("connection.php");
    session_start();
    $regd=$_GET['roll'];
    $user=$_SESSION['username'];
    date_default_timezone_set('Asia/Kolkata');
    $dt= date('Y-m-d');
    $access=mysqli_query($connect,"SELECT access_level FROM details WHERE username='$user'");
    $access1=mysqli_fetch_array($access);
    $connect1=mysqli_connect("localhost:3306","root","","studentsrequests");
    if(!mysqli_select_db($connect1,'studentsrequests'))
        echo "Database not selected";
    $user1=mysqli_query($connect1,"SELECT name from faculty WHERE username='$user'");
    $coun=mysqli_fetch_array($user1);
    $teach=mysqli_query($connect1,"SELECT * FROM students where regd='$regd'");
    $teacher=mysqli_fetch_array($teach);
    if($teacher['counsellor']==$coun['name'])
    {
        if($teacher['counsellor']==$teacher['classteacher'])
        {
             mysqli_query($connect1,"UPDATE requests SET teacherstatus='Rejected' WHERE regdno='$regd'");
             mysqli_query($connect1,"UPDATE status SET classteacher='Rejected' WHERE regdno='$regd'");
        }
        mysqli_query($connect1,"UPDATE requests SET counsellorstatus='Rejected' WHERE regdno='$regd'");
        mysqli_query($connect1,"UPDATE status SET counsellor='Rejected' WHERE regdno='$regd'");
    }
    else if($access1['access_level']==4)
    {
         mysqli_query($connect1,"UPDATE status SET hod='Rejected' WHERE regdno='$regd'");
         mysqli_query($connect1,"UPDATE requests SET hodstatus='Rejected' WHERE regdno='$regd'");
    }
    else
    {
        mysqli_query($connect1,"UPDATE requests SET teacherstatus='Rejected' WHERE regdno='$regd'");
        mysqli_query($connect1,"UPDATE status SET classteacher='Rejected' WHERE regdno='$regd'");
    }
    echo $teacher['classteacher'];
   /* $res=mysqli_query($connect1,"SELECT * FROM requests where regdno='$regd' and dat='$dt'");
    $res1=mysqli_fetch_array($res);
    if($res){
        echo "Hello";
        if($res1['counsellorstatus']=='Accepted' and  $res1['teacherstatus']=='Accepted' and $res1['hodstatus']==='stillpending')
        {
            mysqli_query($connect1,"INSERT INTO hod  (`regdno`, `dat`, `reason`, `fromdate`, `todate`, `state`, `studentno`, `guardianno`) VALUES('$regd', '$res1[dat]', '$res1[reason]', '$res1[fromdate]', '$res1[todate]', 'stillpending', '$res1[studentno]', '$res1[guardianno]')");
        }
    }*/
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