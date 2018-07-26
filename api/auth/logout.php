<?php

    include '../common/common.php';

    session_start();
    if(isset($_GET)) {
        session_destroy();
        unset($_SESSION['name']);
        unset($_SESSION['type']);
        unset($_SESSION['logged_in']);
        header('Location:'.$host_url.'index.php');
        die();
    }
?>
