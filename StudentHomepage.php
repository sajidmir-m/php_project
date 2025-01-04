<?php
include "CheckLoginForStudent.php";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
</head>

<body>
    <div class="container">
        <?php
        include "header.php";
        ?>
        <div class="row ">
            <div class="col-sm-12 col-md-12 col-xl-12">
                <nav class="nav nav-pills nav-justified">
                    <a href="StudentHomePage.php" class="nav-item nav-link ">Home</a>
                    <a href="logout.php" class="nav-item nav-link btn btn-outline-danger btn-sm  ">Logout</a>
                </nav>
            </div>
        </div>
        <div class="row ">
            <div class="col-sm-12 text-center">
                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-white bg-primary border-primary">
                        <h4 class="my-0 fw-normal">Student Dash Board</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-info ">
                                        <h4>You are only eligible to submit a feedback if your attandence is more than 59%</h4>
                                    </li>
                                    <li class="list-group-item text-danger">
                                        <h6>Teachers with open feedback</h6>
                                    </li>
                                    <li class="list-group-item">
                                    <div id="errorhide">
                                    <?php
                                    if (isset($_SESSION['success'])) {
                                        echo '<div class="alert alert-success ">' . $_SESSION['success'] . '</div>';
                                        unset($_SESSION['success']);
                                    }
                                    if (isset($_SESSION['failure'])) {
                                        echo '<div class="alert alert-danger ">' . $_SESSION['failure'] . '</div>';
                                        unset($_SESSION['failure']);
                                    }
                                    ?>
                                </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr class="table-info">
                                                        <th scope="col">#</th>
                                                        <th scope="col">Name of Teacher</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    include "connection.php";
                                                    $StudentSemester = $_SESSION['StudentSemester'];
                                                    if ($StudentSemester == "1") {
                                                        $StatusSemester = "FirstSemester";
                                                    }
                                                    if ($StudentSemester == "2") {
                                                        $StatusSemester = "SecondSemester";
                                                    }
                                                    if ($StudentSemester == "3") {
                                                        $StatusSemester = "ThirdSemester";
                                                    }
                                                    if ($StudentSemester == "4") {
                                                        $StatusSemester = "FourthSemester";
                                                    }
                                                    if ($StudentSemester == "5") {
                                                        $StatusSemester = "FifthSemester";
                                                    }
                                                    if ($StudentSemester == "6") {
                                                        $StatusSemester = "SixthSemester";
                                                    }
                                                    $i = 1;
                                                    $StudentBranch = $_SESSION['StudentBranch'];
                                                    $sql = "SELECT * FROM teacherfeedbackstatus T,teacherslist L WHERE L.branch=? AND T.$StatusSemester ='ON'and L. teacherID=T.TeacherID";
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->bind_param('s', $StudentBranch);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();
                                                    // echo $sql.','.$StudentBranch;
                                                    if ($result->num_rows) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            $StudentRollNumber = $_SESSION['StudentRollNumber'];
                                                            $sql1 = "SELECT * FROM `studentfeedback` WHERE `TeacherID`=? AND `StudentRollNumber`=?";
                                                            $stmt1 = $conn->prepare($sql1);
                                                            $stmt1->bind_param("ss", $row['teacherID'], $StudentRollNumber);
                                                            $stmt1->execute();
                                                            $result1 = $stmt1->get_result();
                                                            $StudentFeedbackCount = $result1->num_rows;
                                                            if($StudentFeedbackCount>0)
                                                            {
                                                               $link='<i class="text-success">Feedback Already Submitted</i>';
                                                            }
                                                            else if($_SESSION['StudentAttandence']>=60)
                                                            {
                                                                $link='<a href="FeedbackForm.php?TeacherID=' . $row['teacherID'] . '"class="btn btn-primary btn-sm">Fill Feedback Form</a>';
                                                            }
                                                            else
                                                            {
                                                                $link='<i class="text-danger">You are not eligible for feedback as your attandence is less than 60%</i>';  
                                                            }
                                                            echo '<tr>
                                                          <th scope="row">' . $i . '</th>
                                                          <td>' . $row['TeacherName'] . '</td>
                                                          <td>'.$link.'</td>
                                                        </tr>';
                                                            $i++;
                                                        }
                                                    } else {
                                                        echo '<tr><td colspan="3"class="text-danger">No any teacher is avaliable for feedback</td>
                                                </tr>';
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--footer-->
    <?php
    include "footer.php";
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#errorhide').delay(4000);
            $('#errorhide').hide(7000);
        });
    </script>
</body>

</html>