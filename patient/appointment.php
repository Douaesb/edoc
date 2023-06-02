<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
    
        
    <title>Mes Rendez-vous</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .time-slot {
    margin-right: 10px;
    margin-bottom: 10px;  
}
.my-button{
    
}
.my-button.selected {
    
  background-color: #0a76d8;
  color: white;

}
</style>
</head>
<body>
    <?php

    //learn from w3schools.com

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='p'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }
    

    //import database
    include("../connection.php");
    $userrow = $database->query("select * from patient where pemail='$useremail'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["pid"];
    $username=$userfetch["pname"];


    //echo $userid;
    //echo $username;
    

    ?>
    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px" >
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                <p class="profile-title"><?php echo substr($username,0,13)  ?>..</p>
                                    <p class="profile-subtitle"><?php echo substr($useremail,0,22)  ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <a href="../logout.php" ><input type="button" value="Se déconnecter" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                    </table>
                    </td>
                
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-home menu-active menu-icon-home-active" >
                        <a href="index.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Accueil</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor">
                        <a href="doctors.php" class="non-style-link-menu"><div><p class="menu-text">Docteurs</p></a></div>
                    </td>
                </tr>
                
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-session">
                        <a href="schedule.php" class="non-style-link-menu"><div><p class="menu-text">Séances programmées</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text">Mes réservations</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-settings">
                        <a href="settings.php" class="non-style-link-menu"><div><p class="menu-text">Paramètres</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-settings">
                        <a href="indexchat.php" class="non-style-link-menu"><div><p class="menu-text">Contacter le docteur</p></a></div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                    <td width="13%" >
                    <a href="appointment.php" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">Retour</font></button></a>
                    </td>
                    <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">Gestion de Rendez-vous</p>
                                           
                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                             Date d'aujourdhui
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            <?php 

                        date_default_timezone_set('Asia/Kolkata');

                        $today = date('Y-m-d');
                        echo $today;

                        $list110 = $database->query("select  * from  rendezvous;");

                        ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                    </td>


                </tr>
               
                <tr>
                    <td colspan="4" >
                        <div style="display: flex;margin-top: 40px;">
                        <div class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49);margin-top: 5px;">Prendre un rendez-vous</div>
                        <!-- <a href="?action=add-session&id=none&error=0" class="non-style-link"><button  class="login-btn btn-primary btn button-icon"  style="margin-left:25px;background-image: url('../img/icons/add.svg');">Ajouter un rendez-vous</font></button> -->
                        <a href="?action=add-rdv&id=none&error=0" class="non-style-link"><button  class="login-btn btn-primary btn button-icon"  style="margin-left:25px;background-image: url('../img/icons/add.svg');">Ajouter un rendez-vous</font></button>
                     
                    </a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="padding-top:10px;width: 100%;" >
                    
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">Tous les rendez-vous (<?php echo $list110->num_rows; ?>)</p>
                    </td>
                    
                </tr>
                <tr>
                    <td colspan="4" style="padding-top:0px;width: 100%;" >
                        <center>
                        <table class="filter-container" border="0" >
                        <tr>
                           <td width="10%">

                           </td> 
                        <td width="5%" style="text-align: center;">
                        Date:
                        </td>
                        <td width="30%">
                        <form action="" method="post">
                            
                            <input type="date" name="daterdv" id="date" class="input-text filter-container-items" style="margin: 0;width: 95%;">

                        </td>
                    <td width="12%">
                        <input type="submit"  name="filter" value=" Filter" class=" btn-primary-soft btn button-icon btn-filter"  style="padding: 15px; margin :0;width:100%">
                        </form>
                    </td>

                    </tr>
                            </table>

                        </center>
                    </td>
                    
                </tr>
                
                <?php
              if ($_POST) {
                // ...
            
                $sqlpt1 = "";
                if (!empty($_POST["daterdv"])) {
                    $daterdv = $_POST["daterdv"];
                    $sqlpt1 = " rendezvous.daterdv = '$daterdv' ";
                }
            
                $sqlpt2 = "";
                if (!empty($_POST["idrdv"])) {
                    $idrdv = $_POST["idrdv"];
                    $sqlpt2 = " rendezvous.idrdv = $idrdv ";
                }
            
                $sqlmain = "SELECT *
                            FROM rendezvous
                            JOIN patient ON rendezvous.pid = patient.pid";
            
                $conditions = array();
            
                if (!empty($sqlpt1)) {
                    $conditions[] = $sqlpt1;
                }
            
                if (!empty($sqlpt2)) {
                    $conditions[] = $sqlpt2;
                }
            
                if (!empty($conditions)) {
                    $sqlmain .= " WHERE " . implode(" AND ", $conditions);
                }
            
                // ...
            
            
                    
                
                    // ...
                
                
                        //echo $sqlmain;

                        
                        
                        //
                    }else{
                        $sqlmain = "SELECT *
                        FROM rendezvous
                        JOIN patient ON rendezvous.pid = patient.pid
                        ORDER BY idrdv DESC";
                    }
                


                ?>

                <tr>
                   <td colspan="4">
                       <center>
                        <div class="abc scroll">
                        <table width="85%" class="sub-table scrolldown" border="0">
                        <thead>
                        <tr>
                                <th class="table-headin">
                                    <div class="table-headin-text">
                                        <p>Type</p>
                                </th>
                                <th class="table-headin">
                                    <div class="table-headin-text">
                                        <p>ID de patient</p>
                                        </div>
                                    
                                </th>
                                <!-- <th class="table-headin">
                                    <div class="table-headin-text">
                                        <p>Nom</p>
                                        </div>
                                </th>
                                
                                <th class="table-headin">
                                    <div class="table-headin-text">
                                        <p>Prenom</p>
                                        </div>
                                    
                                </th>
                                <th class="table-headin">
                                 <div class="table-headin-text">
                                        <p>tel</p>   
                                        </div>
                                    
                                </th>
                                <th class="table-headin">
                                    <div class="table-headin-text">
                                        <p>Email</p>
                                        </div>
                                </th> -->
                                <th class="table-headin">
                                    <div class="table-headin-text">
                                        <p>Date</p>
                                        </div>
                                </th>
                                <th class="table-headin">
                                    <div class="table-headin-text">
                                        <p>Horaire</p>
                                        </div>
                                </th>
                                
                                <th class="table-headin">
                                    <div class="table-headin-text">
                                        <p>Événements</p>
                                        </div>
                                                                    
                                </tr>
                        </thead>
                        <tbody>
                        
                            <?php

                                $result=$database->query($sqlmain);

                                if($result->num_rows==0){
                                    echo '<tr>
                                    <td colspan="4">
                                    <br><br><br><br>
                                    <center>
                                    <img src="../img/notfound.svg" width="25%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Introuvable !</p>
                                    <a class="non-style-link" href="appointment.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp;Afficher tous les rendez-vous &nbsp;</font></button>
                                    </a>
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';
                                    
                                }
                                else{
                                for ( $x=0; $x<$result->num_rows;$x++){
                                    $row=$result->fetch_assoc();
                                    $idrdv=$row["idrdv"];   

                                    $pid=$row["pid"];   

                                    // $pnic=$row["pnic"];   
                                    $typerdv=$row["typerdv"];
                                    // $pname=$row["pname"];
                                    // $pprenom=$row["pprenom"];
                                    // $ptel=$row["ptel"];
                                    // $pemail=$row["pemail"];
                                    $daterdv=$row["daterdv"];
                                    $heurerdv=$row["heurerdv"];
                                    
                                    
                                    echo '<tr>
                                        <td> &nbsp;'.
                                        substr($typerdv,0,30)
                                        .'</td>
                                        <td>
                                        '.substr($pid,0,20).'
                                        </td>
                                      
                                        <td>
                                        '.substr($daterdv,0,20).'
                                        </td>
                                        <td>
                                        '.substr($heurerdv,0,5).'
                                        </td>
                                        
                                        

                                        <td>
                                        <div style="display:flex;justify-content: center;">
                                        
                                        <a href="?action=view&idrdv='.$idrdv.'" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-view"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Voir</font></button></a>
                                       &nbsp;&nbsp;&nbsp;
                                       <a href="?action=drop&id='.$idrdv.'" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-delete"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Annuler</font></button></a>
 
                                       </div>
                                        </td>
                                    </tr>';
                                    
                                }
                            }
                                 
                            ?>
 
                            </tbody>

                        </table>
                        </div>
                        </center>
                   </td> 
                </tr>
                       
                        
                        
            </table>
        </div>
    </div>
    <?php
    
    
if ($_GET) {
    $id = $_GET["id"];
    $action = $_GET["action"];
    if ($action == 'add-rdv') {

        echo '
        <div id="popup1" class="overlay">
                <div class="popup">
                <center>
                    <a class="close" href="appointment.php">&times;</a> 
                    <div style="display: flex;justify-content: center;">
                    <div class="abc">
                    <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Demandez un rendez-vous</p><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                <form action="add-rdv.php" method="POST" class="add-new-form">
                                    <label for="idrdv" class="form-label"></label>
                                </td>
                            </tr>
                            <tr>
                            <br>
                                <td class="label-td" colspan="2">
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="typerdv" id="consultation" value="Consultation" checked>
                                <label class="form-check-label" for="consultation">
                                    Consultation
                                </label>
                            </div>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="typerdv" id="controle" value="Contrôle">
                                <label class="form-check-label" for="controle">
                                    Contrôle
                                </label>
                            </div>     
                                <br> 
                                </td>
                               
                            </tr>
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="pid" class="form-label">Votre ID :</label>
                                </td>
                            </tr>
                            <tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="text" name="pid" class="input-text" min="0"  placeholder="Votre Profile ID " required><br>
                                </td>
                            </tr>
                            <tr> 
                            <tr>
                                
                                
                            <tr> 
                                <td class="label-td" colspan="2">
                                    <label for="daterdv" class="form-label">Date du Rendez-vous :</label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="date" name="daterdv" class="input-text" min="' . date('Y-m-d') . '" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="heurerdv" class="form-label">Horaire du Rendez-vous :</label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">';

        $availableTimeSlots = array(
            '09:00',
            '10:00',
            '11:00',
            '14:00',
            '15:00',
            '16:00'
        );

        echo '<div class="time-slot-container">';
        foreach ($availableTimeSlots as $timeSlot) {
            echo '<input type="button" class="my-button login-btn btn btn-primary-soft time-slot " name="heurerdv" value="' . $timeSlot . '" onclick="selectButton(this)">';
            echo '<script>';
echo 'function selectButton(button) {';
echo '  var buttons = document.getElementsByClassName("my-button");';
echo '  for (var i = 0; i < buttons.length; i++) {';
echo '    buttons[i].classList.remove("selected");';
echo '  }';
echo '  button.classList.add("selected");';
echo '  document.getElementById("heurerdv").value = button.value;';
echo '}';
echo '</script>';
        }
        echo '</div>';

        echo '</td>
                            </tr>
                            <input type="hidden" id="heurerdv" name="heurerdv" value="">
                            <tr>
                                <td colspan="2">
                                    <input type="reset" value="Réinitialiser" class="login-btn btn-primary btn" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                
                                    <input type="submit" value="Confirmez votre Rendez-vous" class="login-btn btn-primary btn" name="rendezvoussubmit">
                                </td>
                
                            </tr>


                        </form>
                        </tr>
                    </table>
                    </div>
                    </div>
                </center>
                <br><br>
        </div>
        </div>
        ';



        }elseif($action=='rdv-added'){
            $nomrdv=$_GET["nomrdv"];
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                    <br><br>
                        <h2>Rendez-vous confirmé</h2>
                        <a class="close" href="appointment.php">&times;</a>
                        <div class="content">
                        Vous avez pris un rendez-vous.<br><br>
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        
                        <a href="appointment.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;OK&nbsp;&nbsp;</font></button></a>
                        <br><br><br><br>
                        </div>
                    </center>
            </div>
            </div>
            ';
        }elseif($action=='drop'){
           
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2>Are you sure?</h2>
                        <a class="close" href="appointment.php">&times;</a>
                        <div class="content">
                            Voulez-vous annuler votre rendez-vous<br>
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <a href="delete-rdv.php?id='.$id.'" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;OUI&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                        <a href="appointment.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;NON&nbsp;&nbsp;</font></button></a>

                        </div>
                    </center>
            </div>
            </div>
            '; 
        }elseif($action=='view'){
         
        
        // $idrdv=$_GET["idrdv"];
        // $action=$_GET["action"];
            $sqlmain= "select * from rendezvous where idrdv='$id'";
            
            $result= $database->query($sqlmain);
            $row=$result->fetch_assoc(); 
            $pid=$row['pid'];
            // $typerdv=$row["typerdv"];
            // $pname=$row["pname"];
            // $pprenom=$row["pprenom"];
            // $ptel=$row["ptel"];
            // $pemail=$row["pemail"];
            $daterdv=$row["daterdv"];
            $heurerdv=$row["heurerdv"];
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2></h2>
                        <a class="close" href="appointment.php">&times;</a>
                        <div class="content">
                          <br>
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">
                                    Voir les détails.</p><br><br>
                                </td>
                            </tr>
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="typerdv" class="form-label">Type de Rendez-vous : </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    '.$typerdv.'<br><br>
                                </td>
                                
                            </tr>
                            
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="nomrdv" class="form-label">CIN </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                
                                    '.$pid.' <br><br>
                                </td>
                                
                            </tr>
                           
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="daterdv" class="form-label">Date et Heure Prévue: </label>
                                    
                                </td>
                            </tr>
                            <tr>
                            <td class="label-td" colspan="2">
                           Le '.$daterdv.'&nbsp;&nbsp;à&nbsp;&nbsp;'.substr($heurerdv, 0, 5).'<br><br>
                            </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="appointment.php"><input type="button" value="OK" class="login-btn btn-primary-soft btn" ></a>
                                
                                    
                                </td>
                
                            </tr>
                           

                        </table>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';
        }
    }
         
    
        ?>


</div>

</body>
</html>