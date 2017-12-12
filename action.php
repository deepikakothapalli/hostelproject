<html>
    <head>
        <style>
            div{
                border:5px solid black;
                background-color:#4CD8FD;
                font-size:2em;
                margin-left:10%;
                margin-right:10%;
                margin-top:5%;
            }
            b{
                margin-top:5%;
                margin-left:10%;
            }
            form{
                display:inline;
            }
            button {
                background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
                border-radius: 12px;
                margin-top:3%;
            }
            input{
                background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 15px 32px;
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
                background-color: #4CAF50;
                margin-right:2%;
            }
            #reject{
                background-color:#F44336;
            }
        </style>
    </head>
</html>
<?php
    include('profile.php');
    echo "<b>Request :</b>";
    $reg='15pa1a0583';
    $connect1=mysqli_connect("localhost:3306","root","","studentsrequests");
    if(!mysqli_select_db($connect1,'studentsrequests'))
        echo "Database not selected";
    $val=mysqli_query($connect1,"SELECT request FROM `Abhinav Dayal` WHERE regdno='$reg'");
    $val1=mysqli_fetch_array($val);
    echo "<br>"."<div><center>".nl2br($val1[0])."</center></div>";
    echo "<center><form action='status.php' method='post'> 
<input type='submit' name='Accept' value='Accept' /> 
</form>";
    echo "<button type='submit'name='Reject' id='reject'>Reject</button></center>";
?>