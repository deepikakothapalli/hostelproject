<html>
    <head>
        <style>
            table{
                font-family:"Comic Sans MS", cursive, sans-serif;
                border:2px solid #5B2C6F;
                width:70%;
                text-align:center;
                margin-left:16%;
                margin-top:8%;
                border-radius:15px;
                padding:10px;
            }
            #one{
                background-color:#5B2C6F;
                color:white;
                border:2px solid #5B2C6F;
                border-radius:10px;
                padding:10px;
            }
            .two{
                color:orange;
            }
            h1{
                margin-top:10%;
                font-family:"Comic Sans MS", cursive, sans-serif;

            }
        </style>
    </head>
</html>
<?php
    session_start();
    $reg=$_SESSION['username'];
    $connect1=mysqli_connect("localhost:3306","root","","studentsrequests");
    if(!mysqli_select_db($connect1,'studentsrequests'))
        echo "Database not selected";
    date_default_timezone_set('Asia/Kolkata');
    $dt= date('Y-m-d');
    $val=mysqli_query($connect1,"SELECT * FROM status WHERE regdno='$reg' and date='$dt'");
    $val1=mysqli_fetch_array($val);
    $count=mysqli_num_rows($val);
    if($count!==0)
    {
        echo "<table><tr id='one'><th colspan='4'>Your request status</th></tr>";
        echo "<tr><th>Date</th><th>Counsellor</th><th>ClassTeacher</th><th>HOD</th></tr>";
        echo "<tr><td>".$val1['date']."</td><td class='two'>".$val1['counsellor']."</td><td class='two'>".$val1['classteacher']."</td><td class='two'>".$val1['hod']."</td></tr></table>";
    }
    else
        echo "<center><h1>Not requested</h1></center>";

?>
