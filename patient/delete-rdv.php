<?php
session_start();

if(isset($_SESSION["user"])){
    if(($_SESSION["user"])=="" or $_SESSION['usertype']!='p'){
        header("location: ../login.php");
    }
} else {
    header("location: ../login.php");
}

if ($_GET && isset($_GET["id"])) {
    include("../connection.php");
    $id = $_GET["id"];
    $result001 = $database->query("DELETE FROM rendezvous WHERE idrdv = $id");
    header("location: appointment.php");
}
?>
