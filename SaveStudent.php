<?php
include "CheckLoginForHod.php";
include'connection.php';
$StudentName = strtoupper($_POST['StudentName']);
$StudentRollNumber = $_POST['StudentRollNumber'];
// $StudentMobileNumber = $_POST['MobileNumber'];
$select1 = "select * from `studentlogin` where  `RollNumber` =?";
    $stmt1 = $conn->prepare($select1);
    $stmt1->bind_param('s', $StudentRollNumber);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    if ($result1->num_rows) 
    {
        $_SESSION['allreadyexist']="errorInAdding";
        $_SESSION['success']='<Font color="red">Student Already exist for this roll no. '.$StudentRollNumber.'</font>';
        header("location:AddDeleteStudent.php");
        exit();
    }
$StudentRollNumber = $_POST['StudentRollNumber'];
$StudentMobileNumber = $_POST['MobileNumber'];
$StudentMobileNumber = $_POST['MobileNumber'];
$StudentBranch = $_SESSION['HodBranch'];
$StudentSemester = $_SESSION['DisplayedSemester'];
$StudentAttandence=$_POST['StudentAttn'];
$INSERT = "INSERT INTO `studentlogin`(`RollNumber`, `MobileNumber`, `Password`, `StudentName`, `Branch`, `semester`, `Attendence`) VALUES (?,?,?,?,?,?,?)";
$stmt = $conn->prepare($INSERT);
$stmt->bind_param("sssssss",$StudentRollNumber, $StudentMobileNumber, $StudentRollNumber,$StudentName, $StudentBranch,$StudentSemester,$StudentAttandence);
$stmt->execute();
$_SESSION['success']="Student added successfully in semester ".$StudentSemester;
$stmt->close();
$conn->close();
header("location:AddDeleteStudent.php");
exit();
?>