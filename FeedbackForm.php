<?php
include "CheckLoginForStudent.php";
$TeacherID = $_GET['TeacherID'];
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
    <style>
        .range {
            width: 80%;
        }
    </style>
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
                    <a href="logout.php" class="nav-item nav-link btn btn-outline-danger btn-sm  float-right">Logout</a>
                </nav>
            </div>
        </div>
        <div class="row ">
            <div class="col-sm-12 text-center">
                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-white bg-primary border-primary">
                        <?php
                        include "connection.php";
                        $sql = "SELECT * FROM teacherslist WHERE TeacherID=?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param('s', $TeacherID);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();
                        ?>
                        <h4 class="my-0 fw-normal">Feedback form for teacher:- <?php echo $row['TeacherName']; ?> Teacher's Department:- <?php echo $row['Branch']; ?></h4>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="list-group">
                                    <li class="list-group-item text-danger">
                                        <h6>Fill the form carefully <br>
                                            <span class="text-success">1=Not Good 2=Good 3=Very Good 4=Nice 5=Best </span>
                                        </h6>
                                    </li>

                                    <form method="POST" action="SaveFeedback.php">
                                        <?PHP
                                        $sql1 = "SELECT * FROM feedbackquestions";
                                        $stmt1 = $conn->prepare($sql1);
                                        $stmt1->execute();
                                        $result1 = $stmt1->get_result();
                                        while ($row1 = $result1->fetch_assoc()) {
                                        ?>
                                            <div class="col-md-6 col-6-12 col-md-6 offset-3">
                                                <li class="list-group-item">
                                                    <div class="form-group">
                                                        <label for="range" class="form-label">
                                                            <h6><?PHP echo $row1['Question']; ?> :</h6>
                                                        </label>
                                                        <?php
                                                        echo ' <script>                                                               
                                                                function changet' . $row1['QuestionID'] . '(abc) {                                                                  
                                                                    document.getElementById("result' . $row1['QuestionID'] . '").innerHTML =abc;
                                                                }
                                                            </script>';
                                                        echo '<input type="range" class="range" min="0" max="5" name="' . $row1['QuestionID'] . '" onChange="changet' . $row1['QuestionID'] . '(this.value);"> <span id="result' . $row1['QuestionID'] . '">3</span>';
                                                        ?>
                                                    </div>
                                                </li>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <input type="hidden" name="TeacherID" value="<?php echo $TeacherID; ?>">
                                        <div class="col-6 text-center my-2 offset-3 ">
                                            <li class="list-group-item">
                                                <button type="submit" class="btn btn-primary font-w400">Submit The Feedback </button>
                                            </li>
                                        </div>
                                    </form>



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