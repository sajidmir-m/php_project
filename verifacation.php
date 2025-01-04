<?php
session_start();
include 'connection.php';

$StudentName = strtoupper($_POST['FullName']);
$StudentRollNumber = $_POST['RollNumber'];
$StudentMobileNumber = $_POST['MobileNumber'];
$StudentEmail = $_POST['Email'];
$StudentBranch = $_POST['Branch'];
$StudentSemester = $_POST['Semester'];
$Password = $_POST['Password'];
$StudentAttendance = 0;

// Generate a verification code
$verificationCode = generateVerificationCode();

// Insert user data into the database
$INSERT = "INSERT INTO `studentlogin`(`RollNumber`, `MobileNumber`, `Email`, `Password`, `StudentName`, `Branch`, `semester`, `Attendance`, `VerificationCode`) VALUES (?,?,?,?,?,?,?,?,?)";
$stmt = $conn->prepare($INSERT);
$stmt->bind_param("sssssssss", $StudentRollNumber, $StudentMobileNumber, $StudentEmail, $Password, $StudentName, $StudentBranch, $StudentSemester, $StudentAttendance, $verificationCode);
$stmt->execute();
$stmt->close();
$conn->close();

// Send verification email
$subject = "Email Verification";
$message = "Dear $StudentName,\n\nThank you for registering. Please use the following verification code to activate your account: $verificationCode\n\nBest regards,\nYour Website Team";
$headers = "From: yourwebsite@example.com";
mail($StudentEmail, $subject, $message, $headers);

$_SESSION['msg'] = "Successfully registered. Please check your email for the verification code.";
header("location:index.php");
exit();

// Function to generate a verification code
function generateVerificationCode()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $verificationCode = '';

    for ($i = 0; $i < 6; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $verificationCode .= $characters[$index];
    }

    return $verificationCode;
}
?>
