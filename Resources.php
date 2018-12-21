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
</head>

<body>
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
    <object data="<?php echo($department_row['Syllabus']); ?>" type="application/pdf" width="100%" height="100%">     
    </object>
</body>
