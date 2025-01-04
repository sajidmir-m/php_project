<?php
include "CheckLoginForHod.php";
include'connection.php';
$Question = $_POST['Question'];
$INSERT = "INSERT INTO `feedbackquestions`(`Question`) VALUES (?)";
$stmt = $conn->prepare($INSERT);
$stmt->bind_param("s",$Question);
$stmt->execute();
$_SESSION['success']="Question added successfully";
$stmt->close();
$conn->close();
header("location:AddDeleteQuestions.php");
exit();
?>