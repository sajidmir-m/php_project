<?php
session_start();
include 'connection.php';

if (isset($_POST['verification_code'])) {
    $verificationCode = $_POST['verification_code'];

    // Retrieve the stored verification code from the database based on the email
    $StudentEmail= $_SESSION[`Email`]; // Assuming you store the email in the session variable
    $query = "SELECT verification_code FROM studentlogin WHERE Email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($storedVerificationCode);
    $stmt->fetch();
    $stmt->close();

    if ($verificationCode === $storedVerificationCode) {
        // Verification code is correct
        // Update the verification status in the database
        $query = "UPDATE studentlogin SET is_verified = 1 WHERE Email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->close();

        // Redirect the user to a success page
        header("Location: success.php");
        exit();
    } else {
        // Verification code is incorrect
        $_SESSION['error'] = "Invalid verification code";
        header("Location: index.php");
        exit();
    }
} else {
    // No verification code provided
    $_SESSION['error'] = "Please enter the verification code";
    header("Location: index.php");
    exit();
}
?>
