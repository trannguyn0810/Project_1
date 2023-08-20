<?php
    session_start();
    $_SESSION["email"] = "";
    header("Location: trang_chủ.php");
