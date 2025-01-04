<?php
session_start();
include'connection.php';
$QuestionID=$_POST['QuestionID'];
$Question = $_POST['Question'];
echo $QuestionID.'<br>'.$Question;
$Update = "UPDATE `feedbackquestions` SET `Question`=? WHERE `QuestionID`=?";
$stmt = $conn->prepare($Update);
$stmt->bind_param("si",$Question,$QuestionID);
$stmt->execute();
$_SESSION['success']="Question updated successfully";
$stmt->close();
$conn->close();
header("location:AddDeleteQuestions.php");
exit();
?>