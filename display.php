<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter&family=Nunito+Sans:wght@700&display=swap');
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css');
        
        body{
            background-image: url("bg.jpg");
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container{
            background: white;
            position: absolute;
            top: 13%;
            min-width: 50%;
            box-shadow: 0px 0px 17px 2px rgba(0,0,0,0.75);
            -webkit-box-shadow: 0px 0px 17px 2px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 0px 17px 2px rgba(0,0,0,0.75);
        }
        .container1{
            position: absolute;
            top: 4%;
        }
        table{
            border-collapse: collapse;
            height: 100%;
            width: 100%;
        }
        table td, table th {
            padding: 22px;
        }
        table tr:nth-child(even){background-color: #f6f6f6;}
        table tr:nth-child(odd){background-color: #fff;}

        table tr:hover {background-color: #ddd;}

        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #08090a;
            color: white;
            font-family: 'Nunito Sans', sans-serif;
        }
        table tr{
            font-family: 'Inter', sans-serif;
            transition: 1s;
        }
        p{
            text-decoration: none;
            font-size: 16px;
            color: black;
            background-color: #fff;
            font-family: 'Inter', sans-serif;
        }
        h1{
            color: black;
        }
        p{
            text-decoration: none;
            font-size: 16px;
            color: black;
            font-family: 'Nunito Sans', sans-serif;
            text-align: center;
        }
        .group {
            display: flex;
            line-height: 28px;
            align-items: center;
            position: relative;
            max-width: 800px;
            gap: 10px;
        }

        .input {
            width: 100%;
            height: 40px;
            line-height: 28px;
            padding: 0 1rem;
            padding-left: 2.5rem;
            border: 2px solid transparent;
            border-radius: 8px;
            outline: none;
            background-color: #f3f3f4;
            color: #0d0c22;
            transition: .3s ease;
        }

        .input::placeholder {
            color: #9e9ea7;
        }

        .input>:focus, .input:hover {
            outline: none;
            background-color: #fff;
            box-shadow: 1px 2px 7px 2px rgba(0,0,0,0.75);
            -webkit-box-shadow: 1px 2px 7px 2px rgba(0,0,0,0.75);
            -moz-box-shadow: 1px 2px 7px 2px rgba(0,0,0,0.75);
        }

        .icon {
            position: absolute;
            left: 1rem;
            fill: #9e9ea7;
            width: 1rem;
            height: 1rem;
        }
        .searchBtn{
            background-color: black;
            color: white;
            height: 40px;
            width: 200px;
            border-radius:10px;
            transition: 1s ease;
            font-family: 'Inter', sans-serif;
        }
        .searchBtn:hover{
            box-shadow: 0px 0px 14px -6px rgba(251,251,251,0.75);
            -webkit-box-shadow: 0px 0px 14px -6px rgba(251,251,251,0.75);
            -moz-box-shadow: 0px 0px 14px -6px rgba(251,251,251,0.75);
        }
    </style>
    <div class="container1">
        <form action=display.php method=get>
        <div class="group">
            <svg class="icon" aria-hidden="true" viewBox="0 0 24 24"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
            <input placeholder="Search" type="search" class="input" name=keyword required>
            <input type=submit value=Search name=search class="searchBtn">
        </div>
        </form>
    </div>
    <div class="container">
        <?php 
        include('connect.php');
        if (isset($_GET['search']))
        {
            if (isset($_GET['delete'])){
                $del=$_GET['delete'];
                $delete="DELETE from register where (student_number='$del')";
                mysqli_query($con, $delete);
                $desc= 'Record deleted';
            }
            else
                $desc= '';
            $key=$_GET['keyword'];
            $q="SELECT * from register where (student_number like '%$key%' or last_name like '%$key%' or first_name like '%$key%' or middle_name like '%$key%' or age like '%$key%' or gender like '%$key%' or course_id like '%$key%' or mgrade like '%$key%' or fgrade like '%$key%' or totalgrade like '%$key%')";
            $result = mysqli_query($con, $q);
            $count = mysqli_num_rows($result);
            if($count==0)
                $desc = "No Record/s Found";
            else{
                $desc= '';
                print("<table><th style='width:20px;'></th><th>Student Number</th><th>Last Name</th><th>First Name</th><th>Middle Name</th><th>Age</th><th>Gender</th><th>Course</th><th>Midterm Grade</th><th>Final Grade</th><th>Total Grade</th><th style='width:10px;'></th><th style='width:10px;'></th>");
                while($records = mysqli_fetch_array($result)){
                $sn = $records['student_number'];
                $lname = $records['last_name'];
                $fname = $records['first_name'];
                $mname = $records['middle_name'];
                $age = $records['age'];
                $gender = $records['gender'];
                $course = $records['course_id'];
                $mgrade = $records['mgrade'];
                $fgrade = $records['fgrade'];
                $tgrade = $records['totalgrade'];
                print "<tr><td></td><td>$sn</td><td>$lname</td><td>$fname</td><td>$mname</td><td>$age</td><td>$gender</td><td>$course</td><td>$mgrade</td><td>$fgrade</td><td>$tgrade</td><td><a href='display.php?delete=$sn'><i class='fa-sharp fa-solid fa-trash'></i></a></td><td><a href='update.php?sn=$sn&lname=$lname&fname=$fname&mname=$mname&age=$age&gender=$gender&course=$course&mgrade=$mgrade&fgrade=$fgrade&tgrade=$tgrade'><i class='fa-sharp fa-solid fa-pen'></i></a></td>";}
            }
        }
        else
        {
            if (isset($_GET['delete'])){
                $del=$_GET['delete'];
                $delete="DELETE from register where (student_number='$del')";
                mysqli_query($con, $delete);
                $desc= 'Record deleted';
            }
            else
                $desc= '';
            print("<table><th style='width:20px;'><th>Student Number</th><th>Last Name</th><th>First Name</th><th>Middle Name</th><th>Age</th><th>Gender</th><th>Course</th><th>Midterm Grade</th><th>Final Grade</th><th>Total Grade</th><th style='width:10px;'></th><th style='width:10px;'></th>");
            $search = "Select * from register order by last_name asc";
            $result = mysqli_query($con, $search);
            $count = mysqli_num_rows($result);
            while($records = mysqli_fetch_array($result)){
                $sn = $records['student_number'];
                $lname = $records['last_name'];
                $fname = $records['first_name'];
                $mname = $records['middle_name'];
                $age = $records['age'];
                $gender = $records['gender'];
                $course = $records['course_id'];
                $mgrade = $records['mgrade'];
                $fgrade = $records['fgrade'];
                $tgrade = $records['totalgrade'];
                print "<tr><td></td><td>$sn</td><td>$lname</td><td>$fname</td><td>$mname</td><td>$age</td><td>$gender</td><td>$course</td><td>$mgrade</td><td>$fgrade</td><td>$tgrade</td><td><a href='display.php?delete=$sn'><i class='fa-sharp fa-solid fa-trash'></i></a></td><td><a href='update.php?sn=$sn&lname=$lname&fname=$fname&mname=$mname&age=$age&gender=$gender&course=$course&mgrade=$mgrade&fgrade=$fgrade&tgrade=$tgrade'><i class='fa-sharp fa-solid fa-pen'></i></a></td>";
        }
    }
        print "</table><hr><p>$desc</p><p>$count Total record/s</p>"
        ?>  
    <a style="text-decoration: none;" href="index.php"><p>Add new records</p></a>
    </div>
</body>

