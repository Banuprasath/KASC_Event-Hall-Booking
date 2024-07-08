<?php
session_start();
session_unset();

// destroy the session
session_destroy();

echo "<script>alert('session destroyed succesfully');</script>";
header('Location: login.php');
?>