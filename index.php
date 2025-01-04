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
<style>
    a {
        text-decoration: none;
        color: white;
    }
</style>

<body>
    <div class="container">
        <?php
        session_start();
        include "header.php";
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark my-2 ">
            <div class="container-fluid mx-2  ">
                <a class="navbar-brand" href="#">MVJCE-SFS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="contact.php">Developers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="cont.php">Contact Us</a>
                        </li>

                    </ul>

                    <div class="mx-2 d-flex">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                    </div>
                    <div class="mx-2 d-flex">
                        <a class="btn btn-success" href="signupform.php">signup</a>
                    </div>
                </div>
            </div>
        </nav>
        <!--Signupmodal------------->


        
       
        <!-------------------------->
        <!--login model------------->


        <!-- Modal -->
        <form action=" login.php" method="post">
            <div class=" modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="loginModalLabel">Login to your account</h5>
                            <?php if (isset($_SESSION['msg'])) {
                            ?>
                                <div class="mb-3">
                                    <label class="form-label">
                                        <font color="Green"><?php echo $_SESSION['msg']; ?></font>
                                    </label>

                                </div>

                            <?php
                            }

                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="user" class="form-label">Mobile number:</label>
                                <input type="text" class="form-control" id="user" name="mobile" placeholder="Your Mobile No" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Your Password" required>
                            </div>
                            <?php if (isset($_SESSION['WRONG_PASS'])) {
                            ?>
                                <div class="mb-3">
                                    <label class="form-label">
                                        <font color="red">Wrong Credentials</font>
                                    </label>

                                </div>

                            <?php
                            }

                            ?>


                            <div class="mb-3">
                                <button type="Submit" class="btn btn-primary">Login</button>
                            </div>

                            <div class="mb-3">
                                Forget Password
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
        <!-------------------------->
        <div class="row ">
            <div class="col-sm-12 text-center">
                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-white bg-primary border-primary">
                        <h4 class="my-0 fw-normal">Student Feedback For Teacher</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-info ">login</li>

                                    <li class="list-group-item">Step 1:Principal is Admin </li>
                                    <li class="list-group-item">Step 2:HOD login </li>
                                    <li class="list-group-item">Step 3:student login</li>

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
    <?php

    if (isset($_SESSION['WRONG_PASS'])) {


        echo "
	<script type='text/javascript'>
   $(document).ready(function() {
        $('#loginModal').modal('show');
    });
</script>
	";



        unset($_SESSION['WRONG_PASS']);
    }



    ?>
    <?php

    if (isset($_SESSION['msg'])) {


        echo "
<script type='text/javascript'>
$(document).ready(function() {
    $('#loginModal').modal('show');
});
</script>
";



        unset($_SESSION['msg']);
    }



    ?>

</body>

</html>
<?php
session_destroy();
?>