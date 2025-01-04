<?php
session_start();
if (!isset($_SESSION['Principal'])) {
    session_destroy();
    header("location:index.php");
}

include'connection.php';
$HODBranch = $_POST['Branch'];

$select1 = "select * from `hodlogin` where  `Branch`=?";
    $stmt1 = $conn->prepare($select1);
    $stmt1->bind_param('s', $HODBranch);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    if ($result1->num_rows) 
    {
        $_SESSION['success']='<Font color="red">HOD Already exist for the branch  '.$HODBranch.'</font>';
        header("location:AddDeleteHOD.php");
        exit();
    }

$HODNAME = strtoupper($_POST['HODNAME']);
$HODMobileNumber = $_POST['MobileNumber'];

$Role="HOD";
$INSERT = "INSERT INTO `hodlogin`(`MobileNumber`, `Password`, `Branch`, `HodName`, `role`) VALUES (?,?,?,?,?)";
$stmt = $conn->prepare($INSERT);
$stmt->bind_param("sssss",$HODMobileNumber, $HODMobileNumber, $HODBranch,$HODNAME,$Role);
$stmt->execute();

$stmt->close();


$TeacherName = strtoupper($_POST['HODNAME']);
$TeacherMobileNumber =  $_POST['MobileNumber'];
$TeacherBranch =$_POST['Branch'];
$TeacherID=rand(10000001,99999999);
$INSERT3 = "INSERT INTO `teacherslist`(`teacherID`, `MobileNumber`, `TeacherName`, `branch`) VALUES (?,?,?,?)";
$stmt3 = $conn->prepare($INSERT3);
$stmt3->bind_param("ssss",$TeacherID, $TeacherMobileNumber, $TeacherName,$TeacherBranch);
$stmt3->execute();
$stmt3->close();
$conn->close();
$_SESSION['success']="HOD added successfully";
header("location:AddDeleteHOD.php");
exit();
?>