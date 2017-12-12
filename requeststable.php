<html>
    <head>
        <style>
            th{
                background-color:green;
                color:white;
                font-size:1.3em;
            }
            td{
                border:0px;
                text-align:center;
                font-size:1em;
                width:5%;
            }
            #one{
                padding:2em;
            }
        </style>
    </head>
</html>
<?php
    $connect1=mysqli_connect("localhost:3306","root","","studentsrequests");
    if(!mysqli_select_db($connect1,'studentsrequests'))
        echo "Database not selected";
    echo "<table border='1' width='60%' align='center'>";
    echo "<tr><th colspan='6'>Today Requests</th></tr>";
    if(mysqli_query($connect1,"SELECT count(*) FROM `Abhinav Dayal`"))
    {
        echo "Hello World!";
        $sql1=mysqli_query($connect1,"SELECT count(*) FROM `Abhinav Dayal`");
        $sql2=mysqli_fetch_array($sql1);
    }
    $regd1=mysqli_query($connect1,"SELECT regdno FROM `Abhinav Dayal`");
    for($i=0;$i<$sql2[0];$i++)
    {   
        $regd2=mysqli_fetch_array($regd1);
        $id=$regd2[0];
        if($res=mysqli_query($connect1,"SELECT * FROM faculty where regd='$id'"))
            $res1=mysqli_fetch_assoc($res);
        echo '<tr><td><img src="data:image/jpeg;base64,'.base64_encode( $res1['images'] ).'" width="200" height="200"/></td>';
       /* echo "<td>".$id."</td><td>".$res1['name']."</td>"."<td>".$res1['branch']."</td>"."<td>".$res1['year']."</td>"."<td id='#one'><button name='button'>View</button></td></tr>";  */ 
        echo "<td>".$id."</td><td>".$res1['name']."</td>"."<td id='#one'>
       <form action='action.php' method='post'> 
<input type='submit' name='button' value='View' /> 
</form>
        </td></tr>";  
    }
?>
