<?php
include "CheckLoginForHod.php";
include'connection.php';
$StudentRollNumber=$_GET['RollNumber'];
$delete="DELETE FROM `studentlogin` WHERE RollNumber=?";
$stmt = $conn->prepare($delete);
$stmt->bind_param("s",$StudentRollNumber);
$stmt->execute();
$_SESSION['success']="Student deleted successfully";
$stmt->close();
$conn->close();
header("location:AddDeleteStudent.php");
exit();
?>