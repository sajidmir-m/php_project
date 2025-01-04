<?php
include "CheckLoginForHod.php";
include 'connection.php';
$Semester = $_GET['q'];
 // echo $Semester;
unset($_SESSION['DisplayedSemester']);

$_SESSION['DisplayedSemester'] = $Semester;
$branch = $_SESSION['HodBranch'];

$select = "select * from `studentlogin` where `Branch`=? and `semester`=?";
$stmt = $conn->prepare($select);
$stmt->bind_param('ss', $branch, $Semester);
$stmt->execute();
$result = $stmt->get_result();
$cout = $result->num_rows;
$i = 1;

echo '<form action="update.php" method="POST">
    <div class="table-responsive">
    <table class="table table-bordered table-hover">
    <thead>
    <tr>
            <th class="text-primary"scope="row"colspan="5">Branch:-' . $_SESSION['HodBranch'] . ' Semester:- ' . $Semester . '</th>   
        </tr>
      <tr class="table-info">
        <th scope="col">#</th>
        <th scope="col">Roll Number</th>
        <th scope="col">Student Name</th>
        <th scope="col">Attandence %</th>
       
        
      </tr>
    </thead>
    <tbody>
   ';
if ($cout == 0) {
    echo '<tr>
            <th class="text-danger"scope="row"colspan="5">Currently no student added in Semester ' . $Semester . '</th>   
        </tr>';
} else {
    echo'
    <input type="hidden" name="semester"value=' . $Semester . '>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
       // echo $row['RollNumber'];
            echo'<th scope="row">' . $i . '</th>
            <td>' . $row['RollNumber'] . '</td>
            <td>' . $row['StudentName'] . '</td>
            <td><input type="Number" name=' . $row['RollNumber'] .' Value=';echo $row['Attendence'] ;echo'></td>
            
            </tr>';
        $i++;
    }

echo '
      
      <!-- Existing table code goes here -->
      
      <tr>
          <th scope="row" colspan="4">
              <input type="submit" class="btn btn-outline-primary btn-sm" Value="Update Attendance">
             
          </th>
      </tr>
  
      
        </tbody>
    </table>
</div>
</form>


</div>

';
unset($_SESSION['allreadyexist']);
}