<?php
//session_start();
include'connection.php';
if (isset($_GET['q'])) {
    session_start();
$Semester=$_GET['q'];
}
else{
    $Semester=$_SESSION['DisplayedSemester'];
}
//echo $Semester;

unset($_SESSION['DisplayedSemester']);
$_SESSION['DisplayedSemester']=$Semester;
$branch=$_SESSION['HodBranch'];
$select = "select * from `studentlogin` where `Branch`=? and `semester`=?";
$stmt = $conn->prepare($select);
$stmt->bind_param('ss', $branch,$Semester);
$stmt->execute();
$result = $stmt->get_result();
$cout = $result->num_rows;
$i = 1;

    echo '
    <div class="table-responsive">
    <table class="table table-bordered table-hover">
    <thead>
    <tr>
            <th class="text-primary"scope="row"colspan="5">Branch:-'.$_SESSION['HodBranch'].' Semester:- '.$Semester.'</th>   
        </tr>
      <tr class="table-info">
        <th scope="col">#</th>
        <th scope="col">Roll Number</th>
        <th scope="col">Student Name</th>
        <th scope="col">Attandence %</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>';
    if ($cout == 0)
 {
        echo'<tr>
            <th class="text-danger"scope="row"colspan="5">Currently no student added in Semester '.$Semester.'</th>   
        </tr>';
} else {
    while ($row = $result->fetch_assoc()) {
    echo '<tr>
            <th scope="row">' . $i . '</th>
            <td>' . $row['RollNumber'] . '</td>
            <td>' . $row['StudentName'] . '</td>
            <td>' . $row['Attendence'] . '</td>
            
            <td><a href="DeleteStudent.php?RollNumber='.$row['RollNumber'].'"class="btn btn-outline-warning btn-sm">Delete</a></td>
            </tr>';
            $i++;
             }
            }
      echo'      
        <tr>
        <th scope="row" colspan="5"><button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#AddStudentModal">Add New Student in Semester '.$_SESSION['DisplayedSemester'].' </button></th>
            </tr>
        </tbody>
    </table>
</div>
<form action=" SaveStudent.php" method="post">
<div class=" modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="AddStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="AddStudentModalLabel">Add new student in semester '.$Semester.'</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="StudentName" class="form-label">Student Name:</label>
                    <input type="text" class="form-control text-uppercase" id="StudentName" name="StudentName" placeholder="Students Full Name" required>
                </div>
                <div class="mb-3">
                    <label for="StudentRollNumber" class="form-label">Student Roll Number:</label>
                    <input type="text" class="form-control text-uppercase" id="StudentRollNumber" name="StudentRollNumber"placeholder="Students Roll Number" required>
                </div>
                <div class="mb-3">
                    <label for="MobileNumber" class="form-label">Mobile Number:</label>
                    <input type="text" name="MobileNumber" class="form-control" id="MobileNumber" Pattern="[6-9]{1}[0-9]{9}" placeholder="Students Mobile Number" required />
                </div>
                <div class="mb-3">
                    <label for="StudentBranch" class="form-label">Branch:</label>
                    <input type="text" class="form-control text-uppercase" id="StudentBranch" name="StudentBranch" value='.$branch.' disabled>
                </div>
                <div class="mb-3">
                                                    <label for="user" class="form-label">Email Id:</label>
                                                    <input type="email" class="form-control" id="user" name="Email" placeholder="Your Email Id" required>
                                                </div>
                <div class="mb-3">
                    <label for="StudentSemester" class="form-label">Semester:</label>
                    <input type="text" class="form-control " id="StudentSemester" name="StudentSemester" value='.$Semester.' disabled>
                </div>
                <div class="mb-3">
                    <label for="StudentAttn" class="form-label">Enter Attandence Percentage Of Student:</label>
                    <input type="number" min="0" max="100" class="form-control" id="StudentAttn" name="StudentAttn"placeholder="Students Attandence %" required>
                </div>
                <div class="mb-3">
                    <button type="Submit" class="btn btn-primary">Click To Save</button>
                </div>
            </div>

        </div>
    </div>
</div>
</form>';
unset($_SESSION['allreadyexist']);