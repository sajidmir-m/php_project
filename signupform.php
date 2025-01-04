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
                <a class="navbar-brand" href="index.php">KGP-SFS</a>
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
                        <a class="btn btn-success" href="index.php">Home</a>
                    </div>
                </div>
            </div>
        </nav>
        <!--Signupmodal------------->


        <!-- Modal -->

        <script>
function validatePassword() {
  var password = document.getElementById("password1").value;
  var confirmPassword = document.getElementById("cpassword1").value;

  if (password != confirmPassword) {
    alert("Passwords do not match. Please re-enter confirm password .");
    return false;
  }

  return true;
}
</script>
        <div class="row ">
            <div class="col-sm-12 text-center">
                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-white bg-primary border-primary">
                        <h4 class="my-0 fw-normal">Teacher Evaulation Sysment</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form name="my form" method="POST" action="signup.php"onsubmit="return validatePassword()">

                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="signupModalLabel">Student Registration</h5>

                                            </div>
                                            <?php
                                            if (isset($_SESSION['errormsg'])) {
                                                echo '<div class="alert alert-danger ">' . $_SESSION['errormsg'] . '</div>';
                                                unset($_SESSION['errormsg']);
                                            }
                                            ?>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="user" class="form-label">Full Name:</label>
                                                    <input type="text" class="form-control" id="user" name="FullName" placeholder=" Enter Your Name" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="user" class="form-label"> Phone Number:</label>
                                                    <input type="text" class="form-control" id="user" name="MobileNumber" placeholder="Your Mobile No" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="user" class="form-label">Roll Number:</label>
                                                    <input type="text" class="form-control" id="user" name="RollNumber" placeholder=" Enter Your roll No." required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="user" class="form-label">Email Id:</label>
                                                    <input type="email" class="form-control" id="user" name="Email" placeholder="Your Email Id" required>
                                                </div>

                                                <br>
                                                <div class="mb-3">
                                                    <label for="user" class="form-label">Branch</label>
                                                    <select name="Branch" id="branch" class="form-control">
                                                        <option selected disabled>Choose Your Branch</option>
                                                        <option value="Computer Engg">ComputerEngg</option>
                                                        <option value="Civil Engineering">CivilEngg</option>
                                                        <option value="Electrical Engineering">ElectricalEngg</option>
                                                        <option value="Mechinical Engineering">MechanicalEngg</option>
                                                        <option value="E&C Engineering">E&CEngg</option>
                                                        <option value="Information technology">informationTech</option>
                                                        <option value="Automobile Engineering">AutomobileEngg</option>
                                                        <option value="Woood Technology<">WooodTech</option>
                                                        <option value="Leather Technology">LeatherTech</option>
                                                        <option value="Medical Labortary Technology">Medical Labortary Technology</option>

                                                    </select>
                                                    <br>
                                                    <div class="mb-3">
                                                        <label for="user" class="form-label">Semester</label>
                                                        <select name="Semester" id="branch" class="form-control">
                                                            <option selected disabled>Choose Your Semester</option>
                                                            <option value="1">semester 1</option>
                                                            <option value="2">semester 2</option>
                                                            <option value="3">semester 3</option>
                                                            <option value="4">semester 4</option>
                                                            <option value="5">semester 5</option>
                                                            <option value="6">semester 6</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password:</label>
                                                    <input type="password" class="form-control" id="password1" name="Password" placeholder="Your Password" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Confirm Password:</label>
                                                    <input type="password" class="form-control" id="cpassword1" name="Cpassword" placeholder="Confirm Password" required>


                                                </div>

                                                <div class="mb-3">
                                                    <button type="Submit" class="btn btn-primary">Register</button>
                                                </div>



                                            </div>

                                        </div>

                                </form>
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
<?php
session_destroy();
?>