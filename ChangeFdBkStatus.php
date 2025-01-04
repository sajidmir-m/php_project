<?php
include "CheckLoginForHod.php";
include'connection.php';
$TeacherID=$_GET['TeacherID'];
$Semester=$_GET['Semester'];
$CurrentStatus=$_GET['Status'];
$EmptyStatus="OFF";//used intially when the teacher is not in the teacherfeedbackstaus table
if($CurrentStatus=="OFF"||$CurrentStatus=="")
{
    $status="ON";
}
if($CurrentStatus=="ON")
{
    $status="OFF";
}
$select = "select * from `teacherfeedbackstatus` where `TeacherID`=?";
$stmt = $conn->prepare($select);
$stmt->bind_param('s', $TeacherID);
$stmt->execute();
$result = $stmt->get_result();
$cout = $result->num_rows;
if($cout==0)
{
    $INSERT="INSERT INTO `teacherfeedbackstatus`(`TeacherID`, `FirstSemester`, `SecondSemester`, `ThirdSemester`, `FourthSemester`, `FifthSemester`, `SixthSemester`) VALUES (?,?,?,?,?,?,?)";
    $stmt1 = $conn->prepare($INSERT);
    $stmt1->bind_param('sssssss', $TeacherID,$EmptyStatus,$EmptyStatus,$EmptyStatus,$EmptyStatus,$EmptyStatus,$EmptyStatus);
    $stmt1->execute();
    $stmt1->close();
    $UPDATE="UPDATE `teacherfeedbackstatus` SET `$Semester`=? WHERE `TeacherID`=?";
    $stmt2 = $conn->prepare($UPDATE);
    $stmt2->bind_param('ss',$status, $TeacherID);
    $stmt2->execute();
    $stmt2->close();
}
else{
    $UPDATE="UPDATE `teacherfeedbackstatus` SET `$Semester`=? WHERE `TeacherID`=?";
    $stmt2 = $conn->prepare($UPDATE);
    $stmt2->bind_param('ss',$status, $TeacherID);
    $stmt2->execute();
    $stmt2->close(); 
}
$conn->close();
$_SESSION['success']="Feedback Status Changer";
header("location:ManageTeacherFdBkStatus.php?TeacherID=$TeacherID");
exit();
?>