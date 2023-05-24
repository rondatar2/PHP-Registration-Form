<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter&family=Nunito+Sans:wght@700&display=swap');
        body{
            background-image: url("bg.jpg");
            height: 95%;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container{
            background: rgba(255,255,255,0.55);
            -webkit-backdrop-filter: blur(11px);
            backdrop-filter: blur(11px);
            border: 1px solid rgba(255,255,255,0.275);
            height: 90%;
            width: 60%;
            position: absolute;
            top: 4%;
            padding: 10px 50px;
            border-radius: 20px;
            box-shadow: 0px 0px 17px 2px rgba(0,0,0,0.75);
            -webkit-box-shadow: 0px 0px 17px 2px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 0px 17px 2px rgba(0,0,0,0.75);
        }
        @media only screen and (max-width: 342px){
            .container{
                width: 70%;
            }
        }
        h1{
            font-family: 'Nunito Sans', sans-serif;
        }
        h3{
            font-family: 'Inter', sans-serif;
        }
        input{
            height: 10px;
            padding: 12px 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0px 0px 17px -5px rgba(0,0,0,0.75);
            -webkit-box-shadow: 0px 0px 17px -5px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 0px 17px -5px rgba(0,0,0,0.75);
        }
        #sn{
            width: 70%;
        }
        #lname, #fname, #mname {
            width: 25%;
            margin-right: 1%;
        }
        #mname {
            margin-right: 0px;
        }
        @media only screen and (max-width: 970px){
            #mname {
            margin-top: 10px;
        }
        }
        #spaceLabel{
            margin-right: 21%;
            display: inline;
        }
        input[type="radio"] {
        margin-top: -1px;
        vertical-align: middle;
        height: 25px;
        width: 25px;
        }
        @media only screen and (max-width: 437px){
            input[type="radio"] {
                height: 10px;
                width: 10px;
            }
        }
        label{
            font-family: 'Inter', sans-serif;
            margin-right: 5%;
        }
        @media only screen and (max-width: 501px){
            label {
            margin-right: 0%;
            }
        }
        #age{
            width: 10%;
            margin-right: 8%;
        }
        @media only screen and (max-width: 377px){
            #age{
            margin-right: 0%;
            }
        }
        #mgrade, #fgrade {
            margin-right: 1%;
            margin-left: 1%;
        }
        #fgrade {
            margin-left: 0px;
        }
        #course{
            width: 50%;
            margin-left: 1%;
        }
        .btn{
            height: 50px;
            width: 12%;
            text-decoration: none;
            margin-left: 2%;
            padding: 16px 32px;
            color: white;
            font-size: 16px;
            border: 2px solid ;
            transition: .7s;
        }
        #save{
            background: #008000;
            border: 2px solid #008000;
        }
        #save:hover{
            box-shadow: 0px 0px 18px -1px rgba(0,0,0,0.75);
            -webkit-box-shadow: 0px 0px 18px -1px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 0px 18px -1px rgba(0,0,0,0.75);
            font-weight: bold;
        }
        #reset{
            background: #710c04;
            border: 2px solid #710c04;
        }
        #reset:hover{
            box-shadow: 0px 0px 18px -1px rgba(0,0,0,0.75);
            -webkit-box-shadow: 0px 0px 18px -1px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 0px 18px -1px rgba(0,0,0,0.75);
            font-weight: bold;
        }
        p{
            text-decoration: none;
            font-size: 16px;
            color: black;
            font-family: 'Inter', sans-serif;
        }
    </style>
    <div class="container">
        <form action="update.php" method = get>
            <h1>Update the Record</h1>
            <h3>Student Number</h3>
            <input id=sn type=text name=sn value="<?php print $_GET['sn']; ?>">
            <h3>Name</h3>
            <input id="lname" type=text name= lname value="<?php print $_GET['lname']; ?>">
            <input id="fname" type=text name= fname value="<?php print $_GET['fname']; ?>">
            <input id="mname" type=text name= mname value="<?php print $_GET['mname']; ?>"><br><br>
            <h3 id="spaceLabel">Age</h3><h3 id="spaceLabel">Gender</h3><br><br>
            <input id="age" type=number name= age value="<?php print $_GET['age']; ?>">
            <input type=radio name=gender <?php if (($_GET['gender']) === ('Male')) print 'checked=true';?> value='Male'>
            <label for="male">Male</label>
            <input type=radio name=gender <?php if (($_GET['gender']) === ('Female')) print 'checked=true';?> value='Female'>
            <label for="female">Female</label><br><br><br>
            <h3 style="display: inline;">Course:</h3>
            <input id="course" type=text name= course value="<?php print $_GET['course']; ?>"><br><br><br>
            <h3 style="display: inline;">Grade:</h3>
            <input id="mgrade" type=text name= mgrade value="<?php print $_GET['mgrade']; ?>">
            <input id="fgrade" type=text name= fgrade value="<?php print $_GET['fgrade']; ?>"><br><br><br>
            <center>
                <input id="save" class="btn" type=submit value=Update name= save>
            </center>
        </form>
        <?php 
        if (isset($_GET['save'])){
            include('connect.php');
            $sn = $_GET['sn'];
            $lname = $_GET['lname'];
            $fname = $_GET['fname'];
            $mname = $_GET['mname'];
            $age = $_GET['age'];
            $gender = $_GET['gender'];
            $course = $_GET['course'];
            $mgrade = $_GET['mgrade'];
            $fgrade = $_GET['fgrade'];
            $tgrade = ($mgrade + $fgrade) / 2;
            $update = "UPDATE register SET last_name = '$lname', first_name = '$fname', middle_name = '$mname', age = '$age', gender = '$gender', course_id= '$course', mgrade= '$mgrade', fgrade= '$fgrade', totalgrade= '$tgrade' where (student_number = '$sn')";
            mysqli_query($con, $update);
            print "<p>Succesfuly Updated</p>";
        }   
        ?>
        <a style="text-decoration: none;" href="display.php"><p>List of all records</p></a>
    </div>
</body>