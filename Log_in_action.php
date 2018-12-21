<?php 
session_start();
$conn = new mysqli("localhost", "shubham", "Shubh", "examination_portal");
if($conn->connect_error){
	echo "Connection Error: ".$conn->connect_error;
    die();
}
if(isset($_POST['roll_no'], $_POST['password'])){
    $roll_no = $_POST['roll_no'];
    $password = $_POST['password'];
}elseif(isset($_SESSION['roll_no'], $_SESSION['password'])){
    $roll_no = $_SESSION['roll_no'];
    $password = $_SESSION['password'];
}
$query = "SELECT * FROM student WHERE roll_no = '$roll_no' AND password = '$password'";
$result = $conn->query($query);
$row_count = (int)$result->num_rows;
if($row_count == 1){ 
    $row = $result->fetch_assoc();
    $department = $row['branch'];
    $query = "SELECT * FROM marks WHERE roll_no = '$roll_no'";
    $result = $conn->query($query);
?>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Inconsolata|PT+Sans|Roboto+Mono" rel="stylesheet">
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

        .table_result {
            width: 900px;
            margin-left: 280px;
        }

        .circle {
            width: 130px;
            height: 130px;
            border-radius: 500px;
            display: inline-block;
            background-color: blueviolet;
            margin-left: 1150px;
            position: absolute;
        }

        .main_pic {
            width: 130px;
            height: 130px;
            overflow: hidden;
            border-radius: 500px;
            position: absolute;
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

        .item {
            background-color: #ffdb4d;
            height: 25px;
        }

        .altitem {
            background-color: lightgoldenrodyellow;
            height: 25px;
        }

    </style>
</head>

<body>
    <?php 
 $conn = new mysqli("localhost", "shubham", "Shubh", "examination_portal");
 if($conn->connect_error){
 	echo("Connection Problem : ". $conn->connect_error);
     die();
 }
    $_SESSION['roll_no'] = $roll_no;
    $_SESSION['branch'] = $row['branch'];
    $_SESSION['semester'] = $row['semester'];
    $_SESSION['password'] = $password;
    $br = $row['branch'];
    $sem = $row['semester'];
    $subject_query = "SELECT * FROM semester_subject WHERE semester = '$sem' AND department_name = '$br'";
    $quiz_query = "SELECT * FROM quiz_marks WHERE semester = '$sem' and roll_no = '$roll_no'";
    $minor_query = "SELECT * FROM minor_marks WHERE semester = '$sem' and roll_no = '$roll_no'";
    $major_query = "SELECT * FROM major_marks WHERE semester = '$sem' and roll_no = '$roll_no'";
    $subject_result = $conn->query($subject_query);
    $quiz_result = $conn->query($quiz_query);
    $minor_result= $conn->query($minor_query);
    $major_result= $conn->query($major_query);
    $subject_row = $subject_result->fetch_assoc();
    $quiz_row = $quiz_result->fetch_assoc();
    $minor_row = $minor_result->fetch_assoc();
    $major_row = $major_result->fetch_assoc();
	?>
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
            <h3 class="short_header" style="color:red;"> <a href="Log_in_action.php"> Result </a> </h3>
            <h3 class="short_header"> <a href="attendence.php"> Attendance </a> </h3>
            <h3 class="short_header"> <a href="branch_info.php"> Branch_Info </a> </h3>
            <h3 class="short_header"> <a href="Resources.php" target="_blank"> Resources </a> </h3>
        </div>
    </div>
    <div class="circle">
        <img class="main_pic" src="<?php echo($row['image']) ?>" alt="something">
    </div>
    <div class="table_result">
        <h2 class="text_style_1">
            <?php echo($row['name']) ?> </h2>
        <h3 class="text_style_2">
            <?php echo($row['roll_no']) ?>
        </h3>
        <center>
            <h1 class="text_style_2">> Result</h1>
        </center>
        <hr/>
        <table width="100%" height="50%;">
            <tr>
                <td align="center" colspan="2">
                    <table width="100%" border="1" cellspacing="0" style="padding: 0px; border-width: 0.1px" class="Grid ">
                        <tr class="Header" style="color: Black; font-weight: bold; font-family: Calibri;">
                            <td style='text-align: center; width:10% '>Subjects</td>
                            <td colspan='2' style='text-align: center; '>Quiz Test </td>
                            <td colspan='2' style='text-align: center; '>Minor Test </td>
                            <td colspan='2' style='text-align: center; '>Major Test </td>
                        </tr>
                        <tr class="Header" style="color: Black; font-weight: bold">
                            <td style='width: 20%; text-align: left'>
                            </td>
                            <td style='text-align: center'>Max</td>
                            <td style='text-align: center'>Obt.</td>
                            <td style='text-align: center'>Max</td>
                            <td style='text-align: center'>Obt.</td>
                            <td style='text-align: center'>Max</td>
                            <td style='text-align: center'>Obt.</td>
                        </tr>
                        <tr runat='server' class='Item'>
                            <td style='width: 20%; text-align: left'>
                                <?php echo($subject_row['cr1']) ?> </td>
                            <td style='text-align: center'> 20.0 </td>
                            <td style='text-align: center'>
                                <?php echo($quiz_row['cr1']) ?> </td>
                            <td style='text-align: center'> 30.0 </td>
                            <td style='text-align: center'>
                                <?php echo($minor_row['cr1']) ?> </td>
                            <td style='text-align: center'> 50.0 </td>
                            <td style='text-align: center'>
                                <?php echo($major_row['cr1']) ?> </td>
                        </tr>
                        <tr runat='server' class='AltItem'>
                            <td style='width: 20%; text-align: left'>
                                <?php echo($subject_row['cr2']) ?> </td>
                            <td style='text-align: center'> 20.0 </td>
                            <td style='text-align: center'>
                                <?php echo($quiz_row['cr2']) ?> </td>
                            <td style='text-align: center'> 30.0 </td>
                            <td style='text-align: center'>
                                <?php echo($minor_row['cr2']) ?> </td>
                            <td style='text-align: center'> 50.0 </td>
                            <td style='text-align: center'>
                                <?php echo($major_row['cr2']) ?> </td>
                        </tr>
                        <tr runat='server' class='Item'>
                            <td style='width: 20%; text-align: left'>
                                <?php echo($subject_row['cr3']) ?> </td>
                            <td style='text-align: center'> 20.0 </td>
                            <td style='text-align: center'>
                                <?php echo($quiz_row['cr3']) ?> </td>
                            <td style='text-align: center'> 30.0 </td>
                            <td style='text-align: center'>
                                <?php echo($minor_row['cr3']) ?> </td>
                            <td style='text-align: center'> 50.0 </td>
                            <td style='text-align: center'>
                                <?php echo($major_row['cr3']) ?> </td>
                        </tr>
                        <tr runat='server' class='AltItem'>
                            <td style='width: 20%; text-align: left'>
                                <?php echo($subject_row['cr4']) ?> </td>
                            <td style='text-align: center'> 20.0 </td>
                            <td style='text-align: center'>
                                <?php echo($quiz_row['cr4']) ?> </td>
                            <td style='text-align: center'> 30.0 </td>
                            <td style='text-align: center'>
                                <?php echo($minor_row['cr4']) ?> </td>
                            <td style='text-align: center'> 50.0 </td>
                            <td style='text-align: center'>
                                <?php echo($major_row['cr4']) ?> </td>
                        </tr>
                        <tr runat='server' class='Item'>
                            <td style='width: 20%; text-align: left'>
                                <?php echo($subject_row['cr5']) ?> </td>
                            <td style='text-align: center'> 20.0 </td>
                            <td style='text-align: center'>
                                <?php echo($quiz_row['cr5']) ?> </td>
                            <td style='text-align: center'> 30.0 </td>
                            <td style='text-align: center'>
                                <?php echo($minor_row['cr5']) ?> </td>
                            <td style='text-align: center'> 50.0 </td>
                            <td style='text-align: center'>
                                <?php echo($major_row['cr5']) ?> </td>
                        </tr>
                        <tr runat='server' class='AltItem'>
                            <td style='width: 20%; text-align: left'>
                                <?php echo($subject_row['cr6']) ?> </td>
                            <td style='text-align: center'> 20.0 </td>
                            <td style='text-align: center'>
                                <?php echo($quiz_row['cr6']) ?> </td>
                            <td style='text-align: center'> 30.0 </td>
                            <td style='text-align: center'>
                                <?php echo($minor_row['cr6']) ?> </td>
                            <td style='text-align: center'> 50.0 </td>
                            <td style='text-align: center'>
                                <?php echo($major_row['cr6']) ?> </td>
                        </tr>
                        <tr runat='server' class='Item'>
                            <td style='width: 20%; text-align: left'>
                                <?php echo($subject_row['au']) ?> </td>
                            <td style='text-align: center'> 20.0 </td>
                            <td style='text-align: center'>
                                <?php echo($quiz_row['au']) ?> </td>
                            <td style='text-align: center'> 30.0 </td>
                            <td style='text-align: center'>
                                <?php echo($minor_row['au']) ?> </td>
                            <td style='text-align: center'> 50.0 </td>
                            <td style='text-align: center'>
                                <?php echo($major_row['au']) ?> </td>
                        </tr>
                        <tr runat='server' class='AltItem'>
                            <td style='width: 20%; text-align: left'>
                                Total Marks </td>
                            <td style='text-align: center'> 140.0 </td>
                            <td style='text-align: center'>
                                <?php echo($quiz_row['cr1'] + $quiz_row['cr2'] + $quiz_row['cr3'] + $quiz_row['cr4'] + $quiz_row['cr5'] + $quiz_row['cr6'] + $quiz_row['au']) ?> </td>
                            <td style='text-align: center'> 210.0 </td>
                            <td style='text-align: center'>
                                <?php echo($minor_row['cr1'] + $minor_row['cr2'] + $minor_row['cr3'] + $minor_row['cr4'] + $minor_row['cr5'] + $minor_row['cr6'] + $minor_row['au'])?> </td>
                            <td style='text-align: center'> 350.0 </td>
                            <td style='text-align: center'>
                                <?php echo($major_row['cr1'] + $major_row['cr2'] + $major_row['cr3'] + $major_row['cr4'] + $major_row['cr5'] + $major_row['cr6'] + $major_row['au']) ?> </td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
<?php }
else{
    ob_start(); 
    Header("Location: ./Log_in_project.php?error=Invalid%20username%20or%20password"); 
    ob_end_flush(); 
    die();
}
?>
