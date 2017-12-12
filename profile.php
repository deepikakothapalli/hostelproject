<html>
    <head>
      <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
        <style>
            td{
                color:black;
                font-size:1.2em;
                width:20%;
               font-family:"Comic Sans MS", cursive, sans-serif;
            }
            .one{
                text-align:center;
                width:10%;
                opacity:1;
               font-family:"Comic Sans MS", cursive, sans-serif;
            }
            img{
                border:3px solid gray;                
            }
            b{
                font-size:1em;
            }
            table{
                margin-left:20%;
               /* border:3px solid #5B2C6F;*/  
            }
        </style>
    </head>
</html>
<?php
    echo "<br><br>";
    session_start();
    $connect1=mysqli_connect("localhost:3306","root","","studentsrequests");
    if(!mysqli_select_db($connect1,'studentsrequests'))
        echo "Database not selected";
    $id=$_SESSION['username'];
    $sql = "SELECT images FROM students WHERE regd='$id'";
    $name="SELECT * FROM students WHERE regd='$id'";
    $res=mysqli_query($connect1,$name);
    $result = mysqli_query($connect1,$sql);
    if(!mysqli_query($connect1,$sql))
        echo "Not attained";
    $res1=mysqli_query($connect1,"SELECT image FROM faculty WHERE username='$id'");
    $res2=mysqli_query($connect1,"SELECT * FROM faculty WHERE username='$id'");
    $res3=mysqli_fetch_array($res1);
    $res4=mysqli_fetch_array($res2);
    $row = mysqli_fetch_assoc($result);
    $row1=mysqli_fetch_assoc($res);
    echo "<br><table id='pro' width='60%' align='center'>";
    if($_SESSION['access_level']==1)
    {
        echo '<tr><td class="one"><img src="data:image/jpeg;base64,'.base64_encode( $row['images'] ).'" width="200" height="220"/></td>';
        echo "<td ><hr><b>".$row1['name']."</b>"."<br><hr><br>";
        echo "Regd no : ".$row1['regd']."<br><br>Branch : ".$row1['branch']."<br><br>Year : ".$row1['year']."rd year</td></tr></table>";
    }
    else
    {
        echo '<tr><td class="one"><img src="data:image/jpeg;base64,'.base64_encode( $res3['image'] ).'" width="200" height="220"/></td>';
        echo "<td><hr><b>".$res4['name']."</b>"."<br><hr><br>";
        echo "Assistant Professor<br><br>";
        echo "Branch :".$res4['branch'];
    }
?>