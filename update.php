<?php
session_start();
include 'connection.php';
$Semester = $_POST['semester'];
$branch = $_SESSION['HodBranch'];
$select = "select * from `studentlogin` where `Branch`=? and `semester`=?";
$stmt = $conn->prepare($select);
$stmt->bind_param('ss', $branch, $Semester);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
  $RollNumber = $row['RollNumber'];
  $Attn = $_POST[$RollNumber];
  $update = "update `studentlogin` set `Attendence`=? where `Branch`=? and `semester`=? and `RollNumber`=?";
  $stmt = $conn->prepare($update);
  $stmt->bind_param('ssss', $Attn, $branch, $Semester, $RollNumber);
  $stmt->execute();
}

$stmt->close();
$conn->close();





$_SESSION['update'] = "$Attn";
$_SESSION['success'] = '<Font color="red">Attendence Updated Succesfully</font>';
header("location:AddDeleteStudent.php");


exit();


exit;
