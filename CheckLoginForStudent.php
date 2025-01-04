<?php
    session_start();
    if (!isset($_SESSION['StudentRollNumber'])) {
        session_destroy();
        header("location:index.php");
    }
?>