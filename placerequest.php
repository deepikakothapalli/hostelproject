<html>
    <head>
        <title>Requesting Permission</title>
        <style>
            body{
                margin:-40px;
                padding:0px;
            }
            form{
                margin-left:30%;
            }
            input[type="submit"]{
                width:10%;
				background-color:#5B2C6F;
				color:white;
				border:2px solid #5B2C6F;
				padding:0.3em 1em;
				font-size:20px;
				cursor:pointer;
				border-radius:15px;
				margin-bottom:15px;
                margin-top:20px;
                margin-left:22%;
            }
            table{
                width:70%;
                font-family:"Comic Sans MS", cursive, sans-serif;
                border:3px solid black;
                border-radius:15px;
            }
            th{
                text-align:center;
                border-bottom:3px solid black;
                font-size:1.5em;

            }
            td{
                padding-bottom:1em;
                font-size:1em;
            }
            option{
                height:10%;
                font-size:1.2em;
            }
        </style>
        <script src="jquery-3.2.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    </head>
    <body>
        <form method="POST" action="wel.php">
            <table>
            <tr><th colspan="6">Request For Outing</th></tr>
            <tr><td>Reason:</td>
                <td><select name=reason>
                    <option value="Health problem">Health problem</option>
                    <option value="Health checkup">Health checkup</option>
                    <option value="Relatives Marriage">Relatives Marriage</option>
                    <option value="Technical events participation">Technical events participation</option>
                    <option value="other">other</option>
                </select>
                <!--<input  name="one" type=" hidden" id="MyBox">-->
            </td></tr><br><br>
            <tr><td>Counsellor :</td>
                <td><select name=counsellor>
                    <option value="A.Prasanthi">A.Prasanthi</option>
                    <option value="Ch.Keyrthy">Ch.Keyrthy</option>
                    <option value="B.Sridevi">B.Sridevi</option>
                    <option value="U.Jyothi">U.Jyothi</option>
                </select>
            </td></tr><br><br>
           <tr><td>ClassTeacher :</td>
                <td><select name=teacher>
                    <option value="U.Padma Jyothi">U.Padma Jyothi</option>
                    <option value="A.DurgaRao">A.Durga Rao</option>
                    <option value="A.Prasanthi">A.Prasanthi</option>
                    <option value="B.Sridevi">B.Sridevi</option>
                </select>
            </td></tr><br><br>
            <tr><td>Date :</td><td>From :<input type="date" name="fromd" required></td><td>To :<input type="date" name="tod" required></td></tr>
            <tr><td>Phone no :</td><td>Student :<input type="text" name="student" required></td><td>Guardian :<input type="text" name="guardian" required></td></tr>
            </table>
            <input type="submit" name="submit" value="submit">  
        </form>
    </body>
</html>
