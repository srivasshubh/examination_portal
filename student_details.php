<?php 
$conn = new mysqli("localhost", "shubham", "Shubh", "examination_portal");
if($conn->connect_error){
	echo "Connection Error: ".$conn->connect_error;
}
session_start();
$roll_no = $_SESSION['roll_no'];
$query = "SELECT * FROM student WHERE roll_no = '$roll_no'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
/*foreach($row as $key => $value){
    echo("$key: $value");
}*/
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
            margin-right: 10px;
            margin-top: 10px;
            position: relative;
        }

        .short_header {
            font-family: pt sans;
            font-weight: bolder;
            font-size: 25px;
            margin-left: 15px;
            margin-top: 30px;
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
            margin-left: 50px;
        }

        .student_info_container {
            width: 800px;
            height: 400px;
            margin-left: 380px;
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
            <h3 style="color:red;" class="short_header"> <a href="student_details.php"> Student Activities </a></h3>
            <h3 class="short_header"> <a href="Log_in_action.php"> Result </a> </h3>
            <h3 class="short_header"> <a href="attendence.php"> Attendance </a> </h3>
            <h3 class="short_header"> <a href="branch_info.php"> Branch_Info </a> </h3>
            <h3 class="short_header"> <a href="Resources.php" target="_blank"> Resources </a> </h3>
        </div>
        <center>
            <h3 class="header_text"> Student Details </h3>
        </center>
        <div class="student_info_container">
            <div class="circle">
                <img class="main_pic" src="<?php echo($row['image']) ?>" alt="something">
            </div>
            <pre class="parameter"> <span>Name:</span>                <?php echo($row['name']) ?> </pre>
            <pre class="parameter"> <span>Branch:</span>              <?php echo($row['branch']) ?></pre>
            <pre class="parameter"> <span>Roll Number:</span>      <?php echo($row['roll_no']) ?></pre>
            <pre class="parameter"> <span>Year:</span>                  <?php echo($row['year_of_enrollment']) ?></pre>
            <pre class="parameter"> <span>Semester:</span>           <?php echo($row['semester']) ?></pre>
            <pre class="parameter"> <span>Fathers Name:</span>    <?php echo($row['fathers_name']) ?></pre>
            <pre class="parameter"> <span>Mothers Name:</span>   <?php echo($row['mothers_name']) ?></pre>
            <pre class="parameter"> <span>Date of Birth:</span>     <?php echo($row['dob']) ?></pre>
            <pre class="parameter"> <span>Address:</span>             <?php echo($row['address']) ?></pre>
            <pre class="parameter"> <span>Gender:</span>              <?php echo($row['gender']) ?></pre>
            <pre class="parameter"> <span>Admission-Year:</span> <?php echo(2018-(int)$row['year_of_enrollment']) ?></pre>
        </div>
    </div>
</body>

</html>
