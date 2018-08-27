<?php
session_start();
$_SESSION['session']="false";
header("Location:../vista/index.php");
?>