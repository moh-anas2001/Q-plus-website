<?php
    session_start();
    session_destroy();
    header("Location: index.php");
    set_message("Logged out successfully");
?>