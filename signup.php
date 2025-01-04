<?php
 session_start();
include'connection.php';
$StudentName = strtoupper($_POST['FullName']);
$StudentRollNumber = $_POST['RollNumber'];
$select = "select * from `studentlogin` where `RollNumber`=?";
$stmt = $conn->prepare($select);
$stmt->bind_param('s', $StudentRollNumber);
$stmt->execute();
$result = $stmt->get_result();
$cout = $result->num_rows;
if($cout==1)
{
    $_SESSION['errormsg']="Roll Number Already Registered";
    header("location:signupform.php");
    exit();  
}
else{
$StudentMobileNumber = $_POST['MobileNumber'];
$StudentEmail = $_POST['Email'];
$StudentBranch = $_POST['Branch'];
$StudentSemester = $_POST['Semester'];
$Password=$_POST['Password'];
$StudentAttandence=0;
$INSERT = "INSERT INTO `studentlogin`(`RollNumber`, `MobileNumber`,`Email`, `Password`, `StudentName`, `Branch`, `semester`, `Attendence`) VALUES (?,?,?,?,?,?,?,?)";
$stmt = $conn->prepare ($INSERT);
$stmt->bind_param("ssssssss",$StudentRollNumber, $StudentMobileNumber, $StudentEmail,$Password,$StudentName, $StudentBranch,$StudentSemester,$StudentAttandence);
$stmt->execute();
$stmt->close();
$conn->close();
$_SESSION['msg']="successfully Registered Please Login";
header("location:index.php");
exit();
}
?>