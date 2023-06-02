<?php

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='p'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    
    if($_POST){
        //import database
        include("../connection.php");
        $idrdv=$_POST["idrdv"];
        $pid=$_POST["pid"];
        $typerdv=$_POST["typerdv"];
        // $pname=$_POST["pname"];
        // $pprenom=$_POST["pprenom"];
        // $ptel=$_POST["ptel"];
        // $pemail=$_POST["pemail"];
        $daterdv=$_POST["daterdv"];
        $heurerdv=$_POST["heurerdv"];
        $sql = "INSERT INTO rendezvous (pid, idsec, docid, typerdv, daterdv, heurerdv)
        SELECT p.pid, NULL, NULL, '$typerdv', '$daterdv', '$heurerdv'
        FROM patient p
        WHERE p.pid = '$pid'
        
";

        // -- $sql="insert into rendezvous (typerdv,nomrdv,prenomrdv,numrdv,emailrdv,daterdv,heurerdv) values ('$typerdv','$nomrdv','$prenomrdv','$numrdv','$emailrdv','$daterdv','$heurerdv');";
        $result= $database->query($sql);
        
        header("location: appointment.php?action=rdv-added&idrdv=$idrdv");
        exit();
    }


?>