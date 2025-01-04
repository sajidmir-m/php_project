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
    <script>
        function GetStudentList(str1) {
            var xhttp1;
            if (str1 == "") {
                document.getElementById("StudentList").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp1 = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp1 = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp1.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("StudentList").innerHTML = this.responseText;
                    }
                };
                xmlhttp1.open("GET", "StudentList.php?q=" + str1, true);
                xmlhttp1.send();
            }
        }
    </script>
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
                                <div class="row">
                                    <div class="col-sm-6 offset-sm-3 my-2">
                                        <select class="form-control form-select form-select-sm" aria-label=".form-select-sm example" onchange="GetStudentList(this.value)">
                                            <option selected disabled>Click To Open/View Student List</option>
                                            <option value="1" <?php if(isset($_SESSION['allreadyexist']) AND $_SESSION['DisplayedSemester']=='1') { echo 'selected';}?>>Semester 1</option>
                                            <option value="2"<?php if(isset($_SESSION['allreadyexist']) AND $_SESSION['DisplayedSemester']=='2') { echo 'selected';}?>>Semester 2</option>
                                            <option value="3"<?php if(isset($_SESSION['allreadyexist']) AND $_SESSION['DisplayedSemester']=='3') { echo 'selected';}?>>Semester 3</option>
                                            <option value="4"<?php if(isset($_SESSION['allreadyexist']) AND $_SESSION['DisplayedSemester']=='4') { echo 'selected';}?>>Semester 4</option>
                                            <option value="5"<?php if(isset($_SESSION['allreadyexist']) AND $_SESSION['DisplayedSemester']=='5') { echo 'selected';}?>>Semester 5</option>
                                            <option value="6"<?php if(isset($_SESSION['allreadyexist']) AND $_SESSION['DisplayedSemester']=='6') { echo 'selected';}?>>Semester 6</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="StudentList"></div>
                              <?php
                                     if (isset($_SESSION['allreadyexist'])) {
                                         include'StudentList.php';
                                        unset($_SESSION['allreadyexist']);
                                    }
                                    ?>
                                <!--Model window displayed here-->

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