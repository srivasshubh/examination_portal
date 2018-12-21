<?php 
$conn = new mysqli("localhost", "shubham", "Shubh", "examination_portal");
if($conn->connect_error){
	echo "Connection Error: ".$conn->connect_error;
}
session_start();
$roll_no = $_SESSION['roll_no'];
$branch = $_SESSION['branch'];
$semester = $_SESSION['semester'];
$query = "SELECT * FROM student WHERE roll_no = '$roll_no'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
?>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Inconsolata|PT+Sans|Roboto+Mono" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bitter|Pacifico|Work+Sans" rel="stylesheet">
    <title>
        Student Page
    </title>
    <style>
        body {
            width: 100%;
            height: 100%;
            overflow-x: hidden;
        }

        .main_container {
            width: 100%;
            height: 100%;
            position: absolute;
            display: inline-block;
        }

        .top_div {
            width: 100%;
            height: 23%;
            position: relative;
            background-color: brown;
            display: flex;
        }

        .top_div_text1 {
            margin-left: 20px;
            margin-top: 10px;
            flex: 4;
            z-index: 10;
        }

        .text_style_1 {
            font-family: inconsolata;
            color: darkgreen;
            text-shadow: 0px 2px 2px grey;
            font-size: 30px;
        }

        .text_style_2 {
            font-family: pt sans;
            color: orangered;
        }

        .top_div_text2 {
            font-family: cursive;
            color: white;
            font-size: 33px;
            letter-spacing: 6px;
            text-shadow: 0px 2px 6px grey;
            margin-top: 45px;
            flex: 2;
            animation: anim;
            animation-duration: 1s;
        }

        .side_slide {
            width: 260px;
            height: 100%;
            background-color: #dbdbdb;
            position: absolute;
            color: red;
            margin-left: 2px;
            display: inline-block;
        }

        .circle {
            width: 130px;
            height: 130px;
            border-radius: 500px;
            display: inline-block;
            background-color: blueviolet;
            float: right;
            margin-right: 100px;
            position: relative;
            margin-top: 80px;
        }

        .short_header {
            font-family: pt sans;
            font-weight: bolder;
            font-size: 25px;
            margin-left: 15px;
            margin-top: 30px;
            transition-duration: 0.5s;
        }

        .short_header:hover {
            text-decoration: underline black;
            cursor: pointer;
        }

        .main_pic {
            width: 130px;
            height: 130px;
            overflow: hidden;
            border-radius: 500px;
            position: absolute;
        }

        .admit_container {
            border: 1px solid blue;
            width: 700px;
            height: 420px;
            margin-left: 400px;
            margin-top: 30px;
        }

        .parameter {
            font-family: Work Sans;
            font-size: 20px;
            letter-spacing: 2px;
            color: #EA9C27;
            margin-left: 320px;
        }

        .parameter span {
            font-family: bitter;
            font-size: 22px;
            letter-spacing: 3px;
            text-shadow: 0px 0px 2px grey;
            color: black;
        }

        .header_text {
            font-size: 35px;
            font-family: Pacifico;
            color: mediumvioletred;
            margin-left: 350px;
            text-decoration: underline black;
        }

        .middle_text {
            font-family: Inconsolata;
            font-size: 25px;
            color: black;
            text-shadow: 0px 0px 4px grey;
            margin-left: 320px;
        }

        .parameter1 span {
            font-family: bitter;
            font-size: 22px;
            letter-spacing: 3px;
            color: dimgray;
            margin-left: 400px;
        }

        .parameter1 {
            font-family: PT Sans;
            font-size: 20px;
            letter-spacing: 2px;
            color: mediumpurple;
            margin-left: 0px;
        }

    </style>
</head>

<body>
    <header>
        <div class="top_div">
            <div class="top_div_text1"><img src="logo.png" /> </div>
            <div class="top_div_text2"> Examination Portal </div>
        </div>
        <div class="container">
            <div class="burger_container" onclick="func(); func1();">
                <div class="small_burger"> </div>
                <div class="small_burger"> </div>
                <div class="small_burger"> </div>
            </div>
        </div>
    </header>
    <div class="main_container">
        <div class="side_slide">
            <h3 class="short_header"> <a href="student_details.php"> Student Activities </a></h3>
            <h3 class="short_header"> <a href="Log_in_action.php"> Result </a> </h3>
            <h3 class="short_header"> <a href="attendence.php"> Attendance </a> </h3>
            <h3 class="short_header" style="color:red;"> <a href="branch_info.php"> Branch_Info </a> </h3>
            <h3 class="short_header"> <a href="Resources.php" target="_blank"> Resources </a> </h3>
        </div>
        <?php 
         $conn = new mysqli("localhost", "shubham", "Shubh", "examination_portal");
         if($conn->connect_error){
 	     echo("Connection Problem : ". $conn->connect_error);
            die();
         }
         $department_query = "SELECT * FROM department WHERE department_name = '$branch'";
         $department_result = $conn->query($department_query);
         $department_row = $department_result->fetch_assoc();
     ?>
        <div class="circle">
            <img class="main_pic" src="HOD/<?php echo($department_row['HOD_image']); ?>" alt="something">
        </div>
        <center>
            <h3 class="header_text"> Branch Information </h3>
        </center>
        <pre class="parameter"> <span>Branch: </span>        <?php echo($department_row['department_name']); ?> </pre>
        <pre class="parameter"> <span>Branch-Code: </span><?php echo($department_row['department_code']); ?></pre>
        <pre class="parameter"> <span>HOD Name: </span>   <?php echo($department_row['HOD_name']); ?></pre>
        <hr/>
        <p class="middle_text"> List of Subject Selected By Student in
            <?php echo($semester); ?> Semester in
            <?php echo($branch); ?>
        </p>
        <?php 
        $conn = new mysqli("localhost", "shubham", "Shubh", "examination_portal");
         if($conn->connect_error){
            echo("Connection Problem : ". $conn->connect_error);
            die();
         }
        $subject_query = "SELECT * FROM subject WHERE semester = '$semester' AND sub_department = '$branch'" ;
        $subject_result = $conn->query($subject_query);
        while($subject_row = $subject_result->fetch_assoc()){
        ?>
        <pre class="parameter1"> <span><?php echo($subject_row['subject_code']); ?>:</span> <?php echo($subject_row['subject_name']); ?> </pre>
        <?php } ?>
    </div>
</body>

</html>
