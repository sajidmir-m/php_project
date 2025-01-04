<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        .majid{
            border-radius: 50%;
            width: 200px;
        }
        .dev-container{
            display: flex;
            gap: 10rem;
            padding:100px;
            margin: auto;
        }
        .card1{
            box-shadow: 5px 8px 3px 8px #888888;
            padding: 30px;
            border-radius: 20px;
           height:380px;
           width:250px;
        }
        .card2{
            box-shadow: 5px 8px 3px 8px #888888;
            padding: 30px;
            border-radius: 20px;
           height:380px;
           width:250px;
            
        }
        h2{
            font-size: 22px;
            font-weight:bold;
            padding:20px 0;
        }
        h3{
            font-size: 20px
        }
        .cont{
            /* color:white;
            background-color: orangered;
            border-radius: 10px;
            border:none;
            padding: 5px; */
           margin:10px 0;
        }
        a{
            color:white;
            text-decoration:none;
        }
        @media screen and (max-width: 700px) {
            .dev-container{
                display:flex;
                flex-direction: column;
            }

            @media screen and (min-width: 320px) {
            .dev-container{
                display:flex;
                flex-direction: column;
            }
            .majid{
                width: 100px;
            }
        }
        }
    </style>
</head>
<body>
<div class="container">
        <?php
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
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="contact.php">Developers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="cont.php">Contact Us</a>
                        </li>
                       
                    </ul>

                    <div class="mx-2 d-flex">
                      
                    </div>
                </div>
            </div>
        </nav>
    <div class="dev-container">
    <div class="card2">
        <img class="majid" src="./images/shabir-sir.jpg" alt="dev0">
        <h2>Er. Shabir Ahmad</h2>
        <h3>Instructor/Guider</h3>
        <button class="btn btn-success"><a href="mailto:shabir8918@gmail.com">Contact Us</a></button></div>
       
        <div class="card2">
        <img class="majid" src="./images/sajid.jpg" alt="dev1">
        <h2>Sajid Mir</h2>
        <h3>Full Stack Developer</h3>
        <button class="btn btn-success"><a href="mailto:sajidmir7222@gmail.com">Contact Us</a></button></div>
    </div>
    <div class="card2">
        <img class="majid" src="./images/sajid.jpg" alt="dev1">
        <h2>khubaib</h2>
        <h3>Full Stack Developer</h3>
        <button class="btn btn-success"><a href="mailto:sajidmir7222@gmail.com">Contact Us</a></button></div>
    </div>

    <button class="btn btn-success"><a href="index.php">Back</a></button>
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