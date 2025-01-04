<?php
include "CheckLoginForHod.php";
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
                    <div class="card mb-4 rounded-3 shadow-sm border-primary">
                        <div class="card-header py-3 text-white bg-primary border-primary">
                            <h4 class="my-0 fw-normal">Reports Form</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr class="table-info">
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name of Teacher</th>
                                                    <th scope="col">Feedback Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody><?php
                                                    include "connection.php";
                                                    // $select1 = "select *FROM `teacherslist` WHERE `teacherID`=?";
                                                    //
                                                    $select = "select *FROM `teacherslist` where `branch`=?";
                                                    $stmt = $conn->prepare($select);
                                                    $stmt->bind_param('s', $_SESSION['HodBranch']);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();
                                                    $count = $result->num_rows;
                                                    $i = 1;
                                                    if ($count == 0) {
                                                        echo '<tr>
                                                           <th scope="row"colspan="4">No any teacher is added in your department</th>   
                                                           </tr>';
                                                    } else {
                                                        while ($row = $result->fetch_assoc()) {
                                                            $tid = $row['teacherID'];
                                                            $select1 = "SELECT *FROM `studentfeedback` WHERE `TeacherID`='$tid'";
                                                            $stmt1 = $conn->prepare($select1);
                                                            $stmt1->execute();
                                                            $result1 = $stmt1->get_result();
                                                            $cout1 = $result1->num_rows;
                                                            if ($cout1 > 0) {
                                                                $available = '<span class="text-success"><b>Feedback Available</b></span>';
                                                                $link = '<a href="ViewTeacherFeedback.php?TeacherID=' . $row['teacherID'] . '"class="btn btn-success btn-sm">View Feedback</a>';
                                                            } else {
                                                                $available = "<b>Feedback Not Available</b>";
                                                                $link = "Not Available";
                                                            }
                                                            echo '<tr>
                                                              <th scope="row">' . $i . '</th>
                                                              <td>' . $row['TeacherName'] . '</td>
                                                              <td>' . $available . '</td>
                                                              <td>' . $link . '</td>
                                                            </tr>';
                                                            $i++;
                                                        }
                                                    }
                                                    ?>
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