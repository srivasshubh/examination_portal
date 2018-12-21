<?php
echo "Enter in php file";
if(isset($_FILES['image'])){
    $conn = new mysqli("localhost", "shubham", "Shubh", "examination_portal");
if ($conn->connect_error) {
    echo("Connection failed: " . $conn->connect_error);
}
$name = $_POST['name'];
$roll_no = $_POST['roll_no'];
$branch = $_POST['branch'];
$year = $_POST['year'];
$fathers_name = $_POST['fathers_name'];
$mothers_name = $_POST['mothers_name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$semester = $_POST['semester'];
$mothers_name = $_POST['mothers_name'];
$address = $_POST['address'];
$password = $_POST['password'];
$file_name = $_FILES['image']['name'];
$file_tmp = $_FILES['image']['tmp_name'];
    
$target_dir = "./image1/";
$temp = explode(".", $_FILES['image']['name']);
$image = "student".round(microtime(true)).".".end($temp);
$target_file = $target_dir.basename($image);

move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
$query = "INSERT INTO student (roll_no, name, fathers_name, address, year_of_enrollment,  gender, dob, image, branch, password, semester, mothers_name) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$statement = $conn->prepare($query);
$statement->bind_param('ssssssssssss', $roll_no, $name, $fathers_name, $address, $year, $gender, $dob, $target_file, $branch, $password, $semester, $mothers_name);
$statement->execute();
$statement->close();
}
$conn->close();
?>
