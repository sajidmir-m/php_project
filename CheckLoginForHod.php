<?php
    session_start();
    if (!isset($_SESSION['HodBranch'])) {
        session_destroy();
        header("location:index.php");
    }
?>