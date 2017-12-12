<!DOCTYPE html>
<html>
    <head>
        <title>send message</title>
        <style>
            body{
                margin:1em, 1em;
            }
            #text{
                padding:0.5em;
                padding-right:14em;
                border:2px solid black;
            }

            form{
                font-size:1.3em;
                color:blue;
                margin-left:40%;    
            }
            textarea{
                 border:2px solid black;
            }
            input[type="submit"]{
                width:10%;
				background-color:blue;
				color:white;
				border:2px solid blue;
				padding:10px;
				font-size:20px;
				cursor:pointer;
				border-radius:5px;
				margin-bottom:15px;
                margin-top:20px;
                margin-left:10%;
            }
            select{
                border:2px solid black;
            }
            option{
                font-size:1.2em;
            }
        </style>
    </head>
    <body>
        <br><br>
        <form action="welcome.php" method="post">
            <b>Enter the title :</b><br>
            <input name="text" type="text" id="text" required><br><br>
            <b>Enter your request :</b><br>
            <textarea rows="10" cols="50" name="textarea" required></textarea><br>
            <b>Receiver :</b>
            <select name=receiver>
                <option value="Sumit Gupta">Sumit Gupta</option>
                <option value="Abhinav Dayal">Abhinav Dayal</option>
                <option value="R.Srinivasa Raju">R.Srinivasa Raju</option>
                <option value="K.Narasimha Rao">K. Narasimha Rao</option>
            </select>
            <br>
            <input type="submit" name="submit" value="submit"/>
        </form>
    </body>
</html>
 
