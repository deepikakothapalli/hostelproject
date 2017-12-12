<html>
    <head>
        <style>
            #one{
                color:white;
                font-size:2em;
                background-color:green;
                width:30%;
            }
            td{
                text-align:center;
                font-size:1.3em;
            }
        </style>
    </head>
</html>
<?php
    $connect1=mysqli_connect("localhost:3306","root","","studentsrequests");
    if(!mysqli_select_db($connect1,'studentsrequests'))
        echo "Database not selected";
    //$id ="13pa1a05e5";
    $sql1=mysqli_query($connect1,"SELECT count(*) FROM faculty");
    $sql2=mysqli_fetch_array($sql1);
    $regd1=mysqli_query($connect1,"SELECT regd FROM faculty");
    //echo $sql2[0];
    echo "<table border='1' width='80%' align='center'>";
    echo "<tr id='one'><th><b> Images</b> </th><th> Regd no </th><th>Name</th><th>Branch</th><th>Year</th><th>Request</th>";
    //while($row = mysqli_fetch_array($regd1) {
    //echo "$row[0]";
   // }
    for($i=0;$i<$sql2[0];$i++)
    {   
        $regd2=mysqli_fetch_array($regd1);
        $id=$regd2[0];
        $sql = "SELECT images FROM faculty WHERE regd='$id'";
        $name="SELECT * FROM faculty WHERE regd='$id'";
        $res=mysqli_query($connect1,$name);
        $result = mysqli_query($connect1,$sql);
        if(!mysqli_query($connect1,$sql))
                echo "Not attained";
        $row = mysqli_fetch_assoc($result);
        $row1=mysqli_fetch_assoc($res);
        echo '<tr><td><img src="data:image/jpeg;base64,'.base64_encode( $row['images'] ).'" width="200" height="200"/></td>';
        echo "<td>".$id."</td><td>".$row1['name']."</td>"."<td>".$row1['branch']."</td>"."<td>".$row1['year']."</td>"."<td>".$row1['request']."</td></tr>";
    }
    
    /*if(!mysqli_select_db($connect1,'studentsrequests'))
        echo "Database not selected";
    $sql1="INSERT INTO `image`(`id`,`pic`) VALUES('$id',LOAD_FILE('C:\Users\Deepika Kothapalli\Pictures\Screenshots\sam-chai-6.jpg'))";
    if(mysqli_query($connect1,$sql1))
        echo "image inserted";
    else
        echo "image not inserted";*/
?>