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
                    $receiver=$_SESSION['counsellor'];
                   // $_SESSION['emailid']=$_SESSION['username'];
                    $_SESSION['text']='Your request is successfully sent.';
                    echo $receiver;
                }
                $connect1=mysqli_connect("localhost:3306","root","","studentsrequests");
                date_default_timezone_set('Asia/Kolkata');
                $dt1= date('Y-m-d');
                if(!mysqli_select_db($connect1,'studentsrequests'))
                        echo "Database not selected";
                if(!mysqli_query($connect1,"UPDATE `students` SET counsellor='$_SESSION[counsellor]',classteacher='$_SESSION[teacher]' WHERE regd='$_SESSION[username]'"))
                    echo "Not inserted";
                $ins1=mysqli_query($connect1,"INSERT INTO `{$receiver}` (`regdno`, `dat`, `reason`, `fromdate`, `todate`, `state`, `studentno`, `guardianno`) VALUES ('$_SESSION[username]', '$dt1', '$_SESSION[reason]', '$_SESSION[fromd]', '$_SESSION[tod]', 'stillpending', '$_SESSION[student]', '$_SESSION[guardian]') ");
                if(!($ins1))
                    echo "Not inserted";
                mysqli_query($connect1,"INSERT INTO `status` (`regdno`,`date`, `counsellor`, `classteacher`, `hod`) VALUES ('$_SESSION[username]','$dt1', 'stillpending', 'stillpending', 'stillpending') ");
                header("location:vendor/index.php");  
            ?>
    </body>
</html>