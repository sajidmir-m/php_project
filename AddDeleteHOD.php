<?php
session_start();
if (!isset($_SESSION['Principal'])) {
    session_destroy();
    header("location:index.php");
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
                        include('Principalmenu.php');
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
                                            <tr class="table-info">
                                                <th scope="col">#</th>
                                                <th scope="col">Mobile Number</th>
                                                <th scope="col">Name of the HOD</th>
                                                <th scope="col">Branch</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php
                                                $Principal = "Principal";
                                                include "connection.php";
                                                $select = "select * from `hodlogin` where `role`!=?";
                                                $stmt = $conn->prepare($select);
                                                $stmt->bind_param('s', $Principal);
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                $cout = $result->num_rows;
                                                $i = 1;
                                                if ($cout == 0) {
                                                    echo '<tr>
                                                           <th scope="row"colspan="4">Currently no Hod added yet</th>   
                                                           </tr>';
                                                } else {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo '<tr>
                                                              <th scope="row">' . $i . '</th>
                                                              <td>' . $row['MobileNumber'] . '</td>
                                                              <td>' . $row['HodName'] . '</td>
                                                              <td>' . $row['Branch'] . '</td>
                                                              <td><a href="DeleteHOD.php?MobileNumber=' . $row['MobileNumber'] . '"class="btn btn-outline-warning btn-sm">Delete</a></td>
                                                            </tr>';
                                                        $i++;
                                                    }
                                                }
                                                ?>
                                            <tr>
                                                <th scope="row" colspan="4"><button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#AddHODModal">Add HOD</button></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Modal -->
                                <form action=" SaveHOD.php" method="post">
                                    <div class=" modal fade" id="AddHODModal" tabindex="-1" aria-labelledby="AddHODModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-danger" id="AddHODModalLabel">Add HOD</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="HODNAME" class="form-label">HOD Name:</label>
                                                        <input type="text" class="form-control text-uppercase" id="HODName" name="HODNAME" placeholder="HOD's Full Name" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="MobileNumber" class="form-label">Mobile Number:</label>
                                                        <input type="text" name="MobileNumber" class="form-control" id="MobileNumber" Pattern="[6-9]{1}[0-9]{9}" placeholder="HOD's Mobile Number" required />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="user" class="form-label">Branch</label>
                                                        <div class="mb-3">
                                                    <label for="user" class="form-label">Branch</label>
                                                    <select name="Branch" id="branch" class="form-control">
                                                        <option selected disabled>Choose Your Branch</option>
                                                        <option value="Computer Engineering">ComputerEngg</option>
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
                                                            <button type="Submit" class="btn btn-primary">Click To Save</button>
                                                        </div>
                                                    </div>

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