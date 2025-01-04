<?php
session_start();
$user = $_POST['mobile'];
$Pass = $_POST['password'];
include "connection.php";
$select = "select * from `studentlogin` where `Password`=? and `MobileNumber`=?";
$stmt = $conn->prepare($select);
$stmt->bind_param('ss',$Pass,$user);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows) 
{
	    $row = $result->fetch_assoc();
		$_SESSION['StudentRollNumber']=$row['RollNumber'];
        $_SESSION['StudentBranch']=$row['Branch'];
		$_SESSION['StudentSemester']=$row['semester'];
		$_SESSION['StudentAttandence']=$row['Attendence'];
		$_SESSION['log']='Logged In As Student "'.$row['StudentName'].'"';
		header("location:StudentHomepage.php");
		exit();
	}

 else 
{
	$select1 = "select * from `hodlogin` where `Password`=? and `MobileNumber`=?";
    $stmt1 = $conn->prepare($select1);
    $stmt1->bind_param('ss', $Pass, $user);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    if ($result1->num_rows) 
    {
		$row1 = $result1->fetch_assoc();
		$Role=$row1['role'];
		echo $Role;
		if($Role=="HOD")
		{
		$_SESSION['log']='Logged In As Head of department "'.$row1['Branch'].'"';
		$_SESSION['HodBranch']=$row1['Branch'];
		header("location:HodHomePage.php");
		exit();
		}
		else{	
			    $_SESSION['Principal']="Principal";	
				$_SESSION['log']="Logged In As Principal";			
				header("location:PrincipalHome.php");
				exit();
		}
	}
	else
	{
	$_SESSION['WRONG_PASS'] = "WRONG_PASS";
	header("location:index.php");
	exit();
    }
}
$stmt->close();
$stmt1->close();
$conn->close();
