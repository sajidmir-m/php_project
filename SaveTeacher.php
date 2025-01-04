<?php
include "CheckLoginForHod.php";
include'connection.php';
$TeacherName = strtoupper($_POST['TeacherName']);
$TeacherMobileNumber = strtoupper($_POST['MobileNumber']);
$TeacherBranch = $_SESSION['HodBranch'];
$TeacherID=rand(10000001,99999999);
$INSERT = "INSERT INTO `teacherslist`(`teacherID`, `MobileNumber`, `TeacherName`, `branch`) VALUES (?,?,?,?)";
$stmt = $conn->prepare($INSERT);
$stmt->bind_param("ssss",$TeacherID, $TeacherMobileNumber, $TeacherName,$TeacherBranch);
$stmt->execute();
$_SESSION['success']="Teacher added successfully";
$stmt->close();
$conn->close();
header("location:AddDeleteTeacher.php");
exit();
?>