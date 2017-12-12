<html>
    <head>
        <style>
            table{
                width:90%;
                font-family:"Comic Sans MS", cursive, sans-serif;
                border: 5px solid #5B2C6F;
                margin-left:5%;
                margin-top:5%;
            }
            tr{
                border-bottom:15px solid black;
                padding-left:10px;  
            }
            a {
                border: none;
                color: white;
                padding: 10px 25px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
                border-radius: 12px;
                margin-top:3%;
            }
            #accept{
                background-color: #4CAF50; /* Green */
            }
            #reject{
                background-color:#F44336;
            }
            #one{
                background-color:#5B2C6F;
                color:white;
            }
            h1{
                margin-top:10%;
                font-family:"Comic Sans MS", cursive, sans-serif;

            }
        </style>
    </head>
</html>
<?php
    include("connection.php");
    session_start();

    $connect1=mysqli_connect("localhost:3306","root","","studentsrequests");
    if(!mysqli_select_db($connect1,'studentsrequests'))
        echo "Database not selected";
    $user=$_SESSION['username'];
    date_default_timezone_set('Asia/Kolkata');
    $dt= date('Y-m-d');
    $name=mysqli_query($connect1,"SELECT name from faculty WHERE username='$user'");
    $name1=mysqli_fetch_array($name);
   // $count1=mysqli_num_rows($name);
    $access=mysqli_query($connect,"SELECT access_level FROM details WHERE username='$user'");
    $access1=mysqli_fetch_array($access);
   // $_SESSION['couns']=$name1['name'];
    //echo $name1['name'];
    $res1=mysqli_query($connect1,"SELECT * FROM `requests` where dat='$dt' and classteacher='$name1[name]'and counsellorstatus='Accepted' and teacherstatus!='Accepted'");
    if($access1['access_level']==4)
        $res=mysqli_query($connect1,"SELECT * FROM `hod` where dat='$dt'");
    else{
        //echo "HELLO";
        //echo $name1['name'];
        $res=mysqli_query($connect1,"SELECT * FROM `requests` where dat='$dt' and counsellor='$name1[name]'");
    }
    if($res){
        echo "HELLO";
        $count=mysqli_num_rows($res);
        echo $count;
    }
    if($res1)
        $count1=mysqli_num_rows($res1);
    if(($count!=0)||($count1!=0))
    {
        echo "<table><tr><th colspan='7'>Today's Requests</th></tr>";
        echo "<tr id='one'><th>image</th><th>details</th><th>Purpose</th><th>Duration</th><th>phone no</th><th>Accept</th><th>Reject</th></tr>";
        for($i=0;$i<$count;$i++)
        {
            $reg=mysqli_fetch_array($res);
            $regd=$reg['regdno'];
            $detail=mysqli_query($connect1,"SELECT images FROM students where regd='$regd'");
            $detail1=mysqli_fetch_array($detail);
            $info=mysqli_query($connect1,"SELECT * FROM students where regd='$regd'");
            $info1=mysqli_fetch_array($info);
            echo '<tr><td id="img"><img src="data:image/jpeg;base64,'.base64_encode( $detail1['images'] ).'" width="80" height="80"/></td>';
            echo "<td>Regdno :".$regd."<br>name :".$info1['name']."<br>Branch :".$info1['branch']."<br>Year :".$info1['year']."</td>";
            echo "<td>".$reg['reason']."</td>";
            echo "<td>From :".$reg['fromdate']."<br>To  :".$reg['todate']."</td>";
            echo "<td>Student :".$reg['studentno']."<br>Parent :".$reg['guardianno']."</td>";
            echo "<td><a id='accept' href='http://localhost:8080/hostel%20project/class.php?roll=$regd'>Accept</a></td><td><a id='reject' href='http://localhost/hostel%20project/reject.php?roll=$regd'>Reject</a></td></tr>";
        }
        if($count1!=0)
        {
            for($i=0;$i<$count1;$i++)
            {
                $reg=mysqli_fetch_array($res1);
                $regd=$reg['regdno'];
                $detail=mysqli_query($connect1,"SELECT images FROM students where regd='$regd'");
                $detail1=mysqli_fetch_array($detail);
                $info=mysqli_query($connect1,"SELECT * FROM students where regd='$regd'");
                $info1=mysqli_fetch_array($info);
                echo '<tr><td id="img"><img src="data:image/jpeg;base64,'.base64_encode( $detail1['images'] ).'" width="80" height="80"/></td>';
                echo "<td>Regdno :".$regd."<br>name :".$info1['name']."<br>Branch :".$info1['branch']."<br>Year :".$info1['year']."</td>";
                echo "<td>".$reg['reason']."</td>";
                echo "<td>From :".$reg['fromdate']."<br>To  :".$reg['todate']."</td>";
                echo "<td>Student :".$reg['studentno']."<br>Parent :".$reg['guardianno']."</td>";
                echo "<td><a id='accept' href='http://localhost:8080/hostel%20project/class.php?roll=$regd'>Accept</a></td><td><a id='reject' href='http://localhost/hostel%20project/reject.php?roll=$regd'>Reject</a></td></tr>";
            }
        }
        echo "</table>";
    }
    else 
        echo "<center><h1>No requests yet</h1></center>";
?>