<?php
include "CheckLoginForHod.php";
include 'connection.php';
$TeacherID = $_GET['TeacherID'];
$select1 = "select * from `teacherslist` where `teacherID`=?";
$stmt1 = $conn->prepare($select1);
$stmt1->bind_param('s', $TeacherID);
$stmt1->execute();
$result1 = $stmt1->get_result();
$row1 = $result1->fetch_assoc();
$TeacherName = $row1['TeacherName'];

$select = "select * from `teacherfeedbackstatus` where `TeacherID`=?";
$stmt = $conn->prepare($select);
$stmt->bind_param('s', $TeacherID);
$stmt->execute();
$result = $stmt->get_result();
$cout = $result->num_rows;
$row = $result->fetch_assoc();
if ($cout > 0) {
    $firstsemStuatus = $row['FirstSemester'];
    $secondsemStuatus = $row['SecondSemester'];
    $thirdsemStuatus = $row['ThirdSemester'];
    $fourthsemStuatus = $row['FourthSemester'];
    $fifthsemStuatus = $row['FifthSemester'];
    $sixthsemStuatus = $row['SixthSemester'];
} else {
    $firstsemStuatus = "OFF";
    $secondsemStuatus = "OFF";
    $thirdsemStuatus = "OFF";
    $fourthsemStuatus = "OFF";
    $fifthsemStuatus = "OFF";
    $sixthsemStuatus = "OFF";
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <?php
        include "header.php";
        ?>
        <div class="row ">
            <div class="col-sm-12 text-center">
                <div class="card mb-4 rounded-3 shadow-sm border-success">
                    <div class="card-header py-1 text-white  border-primary">
                        <?php
                        include('HodMenu.php');
                        ?>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="errorhide">
                                    <?php
                                    if (isset($_SESSION['success'])) {
                                        echo '<div class="alert alert-success ">' . $_SESSION['success'] . '</div>';
                                        unset($_SESSION['success']);
                                    }
                                    ?>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr class="table-success">
                                                <th scope="col" colspan="7"class="text-center text-danger">Name of Teacher:-<?php echo $TeacherName; ?></th>
                                            </tr>
                                            <tr class="table-info">
                                                <th scope="col text-center" colspan="7">Semester wise feedback status</th>
                                            </tr>
                                            <tr class="table-info">
                                                <th scope="col">SEMESTER</th>
                                                <th scope="col">First </th>
                                                <th scope="col">Second </th>
                                                <th scope="col">Third </th>
                                                <th scope="col">Fourth </th>
                                                <th scope="col">Fifth </th>
                                                <th scope="col">Sixth </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="col">Current Status</th>
                                                <td><?php echo $firstsemStuatus; ?>
                                                </td>
                                                <td><?php echo $secondsemStuatus; ?>
                                                </td>
                                                <td><?php echo $thirdsemStuatus; ?>
                                                </td>
                                                <td><?php echo $fourthsemStuatus; ?>
                                                </td>
                                                <td><?php echo $fifthsemStuatus; ?>
                                                </td>
                                                <td><?php echo $sixthsemStuatus; ?>
                                                </td>
                                            </tr>
                                            <?php
                                            if ($firstsemStuatus == "OFF") {
                                                $link1 = '<a href="ChangeFdBkStatus.php?TeacherID=' . $TeacherID . '&Status=' . $firstsemStuatus . '&Semester=FirstSemester"class="btn btn-primary btn-sm">Turn ON</a>';
                                            } else {
                                                $link1 = '<a href="ChangeFdBkStatus.php?TeacherID=' . $TeacherID . '&Status=' . $firstsemStuatus . '&Semester=FirstSemester"class="btn btn-danger  btn-sm">Turn OFF</a>';
                                            }
                                            if ($secondsemStuatus == "OFF") {
                                                $link2 = '<a href="ChangeFdBkStatus.php?TeacherID=' . $TeacherID . '&Status=' . $secondsemStuatus . '&Semester=SecondSemester"class="btn btn-primary btn-sm">Turn ON</a>';
                                            } else {
                                                $link2 = '<a href="ChangeFdBkStatus.php?TeacherID=' . $TeacherID . '&Status=' . $secondsemStuatus . '&Semester=SecondSemester"class="btn btn-danger  btn-sm">Turn OFF</a>';
                                            }
                                            if ($thirdsemStuatus == "OFF") {
                                                $link3 = '<a href="ChangeFdBkStatus.php?TeacherID=' . $TeacherID . '&Status=' . $thirdsemStuatus . '&Semester=ThirdSemester"class="btn btn-primary btn-sm">Turn ON</a>';
                                            } else {
                                                $link3 = '<a href="ChangeFdBkStatus.php?TeacherID=' . $TeacherID . '&Status=' . $thirdsemStuatus . '&Semester=ThirdSemester"class="btn btn-danger  btn-sm">Turn OFF</a>';
                                            }
                                            if ($fourthsemStuatus == "OFF") {
                                                $link4 = '<a href="ChangeFdBkStatus.php?TeacherID=' . $TeacherID . '&Status=' . $fourthsemStuatus . '&Semester=FourthSemester"class="btn btn-primary btn-sm">Turn ON</a>';
                                            } else {
                                                $link4 = '<a href="ChangeFdBkStatus.php?TeacherID=' . $TeacherID . '&Status=' . $fourthsemStuatus . '&Semester=FourthSemester"class="btn btn-danger  btn-sm">Turn OFF</a>';
                                            }
                                            if ($fifthsemStuatus == "OFF") {
                                                $link5 = '<a href="ChangeFdBkStatus.php?TeacherID=' . $TeacherID . '&Status=' . $fifthsemStuatus . '&Semester=FifthSemester"class="btn btn-primary btn-sm">Turn ON</a>';
                                            } else {
                                                $link5 = '<a href="ChangeFdBkStatus.php?TeacherID=' . $TeacherID . '&Status=' . $fifthsemStuatus . '&Semester=FifthSemester"class="btn btn-danger  btn-sm">Turn OFF</a>';
                                            }
                                            if ($sixthsemStuatus == "OFF") {
                                                $link6 = '<a href="ChangeFdBkStatus.php?TeacherID=' . $TeacherID . '&Status=' . $sixthsemStuatus . '&Semester=SixthSemester"class="btn btn-primary btn-sm">Turn ON</a>';
                                            } else {
                                                $link6 = '<a href="ChangeFdBkStatus.php?TeacherID=' . $TeacherID . '&Status=' . $sixthsemStuatus . '&Semester=SixthSemester"class="btn btn-danger  btn-sm">Turn OFF</a>';
                                            }
                                            ?>
                                            <tr>
                                                <th scope="col">Change Status</th>
                                                <td><?php echo $link1; ?>
                                                </td>
                                                <td><?php echo $link2; ?>
                                                </td>
                                                <td><?php echo $link3; ?>
                                                </td>
                                                <td><?php echo $link4; ?>
                                                </td>
                                                <td><?php echo $link5; ?>
                                                </td>
                                                <td><?php echo $link6; ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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