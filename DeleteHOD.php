<?php
session_start();
if (!isset($_SESSION['Principal'])) {
    session_destroy();
    header("location:index.php");
}

include "connection.php";
$HODMobileNumber=$_GET['MobileNumber'];
//echo $HODMobileNumber;
$delete="DELETE FROM `hodlogin` WHERE `MobileNumber` =?";
$stmt = $conn->prepare($delete);
$stmt->bind_param("s",$HODMobileNumber);
$stmt->execute();

$stmt->close();


$delete1="DELETE FROM `teacherslist` WHERE `MobileNumber`=?";
$stmt1 = $conn->prepare($delete1);
$stmt1->bind_param("s",$HODMobileNumber);
$stmt1->execute();
$stmt1->close();
$conn->close();
$_SESSION['success']="HOD deleted successfully";
header("location:AddDeleteHOD.php");
exit();
?>