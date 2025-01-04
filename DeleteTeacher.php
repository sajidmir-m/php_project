<?php
include "CheckLoginForHod.php";
include'connection.php';
$TeacherID=$_GET['TeacherID'];
$delete="DELETE FROM `teacherslist` WHERE teacherID=?";
$stmt = $conn->prepare($delete);
$stmt->bind_param("s",$TeacherID);
$stmt->execute();
$_SESSION['success']="Teacher deleted successfully";
$stmt->close();
$conn->close();
header("location:AddDeleteTeacher.php");
exit();
?>