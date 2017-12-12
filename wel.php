<html>
    <head>
    </head>
    <body>    
            <?php
                session_start();
                if(isset($_POST['fromd'],$_POST['tod'],$_POST['student'],$_POST['guardian']))
                {
                    $_SESSION['reason']=$_POST['reason'];
                    $_SESSION['counsellor']=$_POST['counsellor'];
                    $_SESSION['teacher']=$_POST['teacher'];
                    $_SESSION['fromd']=$_POST['fromd'];
                    $_SESSION['tod']=$_POST['tod'];
                    $_SESSION['student']=$_POST['student'];
                    $_SESSION['guardian']=$_POST['guardian'];
                    $_SESSION['emailid']=$_SESSION['username'];
                    $_SESSION['id']=$_SESSION['username'];
                    $_SESSION['text']="Your request is successfully sent!!!";
                    $receiver=$_SESSION['counsellor'];
                    echo $receiver;
                }
                $connect1=mysqli_connect("localhost:3306","root","","studentsrequests");
                date_default_timezone_set('Asia/Kolkata');
                $dt1= date('Y-m-d');
                if(!mysqli_select_db($connect1,'studentsrequests'))
                        echo "Database not selected";
                if(!mysqli_query($connect1,"UPDATE `students` SET counsellor='$_SESSION[counsellor]',classteacher='$_SESSION[teacher]' WHERE regd='$_SESSION[username]'"))
                    echo "Not inserted";
                if(!mysqli_query($connect1,"INSERT INTO `requests` (`regdno`, `dat`, `reason`, `fromdate`, `todate`, `counsellorstatus`, `teacherstatus`,`hodstatus`, `studentno`, `guardianno`, `counsellor`, `classteacher`) VALUES ('$_SESSION[username]', '$dt1', '$_SESSION[reason]', '$_SESSION[fromd]', '$_SESSION[tod]', 'stillpending', 'stillpending','stillpending', '$_SESSION[student]', '$_SESSION[guardian]', '$_SESSION[counsellor]', '$_SESSION[teacher]') "))
                    echo "Not inserted";
                $res=mysqli_query($connect1,"SELECT * from faculty WHERE name='$_SESSION[counsellor]'");
                //echo $_SESSION['counsellor'];
                $res1=mysqli_fetch_array($res);
                echo $res1['name'];
                $ph=mysqli_query($connect1,"SELECT * from students WHERE regd='$_SESSION[username]'");
                $ph1=mysqli_fetch_array($ph);
                $_SESSION['sms']="Your child ".$ph1['name']." has requested for outing";
                $_SESSION['phone']=$res1['phoneno'];
               // include("vendor/index1.php");
                echo $_SESSION['phone'];
                //include('phpsample1.php');
                $_SESSION['number']=$_SESSION['student'];
               // include('phpsample2.php');
                $_SESSION['parent']=$ph1['parentno'];
                //include('phpsample.php');
                mysqli_query($connect1,"INSERT INTO `status` (`regdno`,`date`, `counsellor`, `classteacher`, `hod`) VALUES ('$_SESSION[username]','$dt1', 'stillpending', 'stillpending', 'stillpending') ");
                //header("location:vendor/index.php");  
            ?>
    </body>
</html>