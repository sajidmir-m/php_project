<?php
include "CheckLoginForStudent.php";
include 'connection.php';
$TeacherID = $_POST['TeacherID'];
$StudentRollNumber = $_SESSION['StudentRollNumber'];
//echo $TeacherID . '<br>' . $StudentRollNumber;
$sql1 = "SELECT * FROM `studentfeedback` WHERE `TeacherID`=? AND `StudentRollNumber`=?";
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("ss", $TeacherID, $StudentRollNumber);
$stmt1->execute();
$result1 = $stmt1->get_result();
$StudentFeedbackCount = $result1->num_rows;

$sql2 = "SELECT * FROM feedbackquestions";
$stmt2 = $conn->prepare($sql2);
$stmt2->execute();
$result2 = $stmt2->get_result();
$NoOfQuestions = $result2->num_rows;
if ($StudentFeedbackCount == $NoOfQuestions) {
    $_SESSION['failure'] = "You have already submitted feedback for this teacher";
    $stmt1->close();
    $stmt2->close();
    $conn->close();
    header("location:StudentHomepage.php");
} else {
    while ($row2 = $result2->fetch_assoc()) {
        $a = $_POST[$row2['QuestionID']];
        $sql3 = "INSERT INTO `studentfeedback`(`TeacherID`, `StudentRollNumber`, `QuestionID`, `Rating`) VALUES (?,?,?,?)";
        $stmt3 = $conn->prepare($sql3);
        $stmt3->bind_param("ssss", $TeacherID, $StudentRollNumber, $row2['QuestionID'], $a);
        $stmt3->execute();
       
    }
    $_SESSION['success'] = "Feedback submitted successflly";
    $stmt1->close();
    $stmt2->close();
    $stmt3->close();
    $conn->close();
    header("location:StudentHomepage.php");
}
