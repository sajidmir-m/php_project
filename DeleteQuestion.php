<?php
include "CheckLoginForHod.php";
include'connection.php';
$QuestionID=$_GET['QuestionID'];
$delete="DELETE FROM `feedbackquestions` WHERE QuestionID=?";
$stmt = $conn->prepare($delete);
$stmt->bind_param("s",$QuestionID);
$stmt->execute();
$_SESSION['success']="Question deleted successfully";
$stmt->close();
$conn->close();
header("location:AddDeleteQuestions.php");
exit();
?>