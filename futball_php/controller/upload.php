<?php


if (empty($_SESSION['admin'])) {
    header('Location: index.php?page=index');
}


    if (isset($_POST['teamadd'])) {
        if (isset($_POST['addteamname'])) {
            if($_POST['addteamname']!="defaultvalue"){
                    $sql="INSERT INTO teams(team_name,manager,director)
                    VALUES('".$_POST['addteamname']."','".$_POST['addteammanager']."','".$_POST['addteamdirector']."')";
                    if($conn->query($sql) === TRUE) {
                        $addteamError="Sikeres team hozzáadás!<br>";
                        
                    } else {
                        $addteamError="Nem létezik ilyen felhasználó";
                        
                    }
            }
        }else $addteamError="Válassza ki a felhasználót akit teamná akar tenni.";
    }
    if (isset($_POST['delteam'])) {
        if (isset($_POST['delteamname']) and strlen($_POST['delteamname']!=0)) {
            
        
        if($_POST['delteamname']!="defaultvalue"){
            
                 $sql="DELETE FROM teams WHERE team_id='".$_POST['delteamname']."'";
                 if($conn->query($sql) === TRUE) {
                    $delteamError="Sikeres admin törlés!<br>";
                    
              } else {
                $delteamError="Error: " . $sql . "<br>" . $conn->error;
              }
             }
         }else $addAdminError="Válassza ki az admint akit törölni akar.";
        }
        if (isset($_POST['addplayer'])) {
            if (isset($_POST['addplayerage'])) {
                if (isset($_POST['addplayername'])) {
                if($_POST['addplayerteam']!="defaultvalue"){
                    if($_POST['positionname']!="defaultvalue"){
                        $sql="INSERT INTO players(player_name,team_id,position,age)
                        VALUES('".$_POST['addplayername']."','".$_POST['addplayerteam']."','".$_POST['positionname']."','".$_POST['addplayerage']."')";
                        if($conn->query($sql) === TRUE) {
                            $addteamError="Sikeres játékos hozzáadás!<br>";
                            
                        } else {
                            $addteamError="Nem létezik ilyen felhasználó";
                            
                        }
                }}
            }else $addteamError="Válassza ki a felhasználót akit teamná akar tenni.";
        }
    }
    if (isset($_POST['delplayer'])) {
        if (isset($_POST['delplayername']) and strlen($_POST['delplayername']!=0)) {
            
        
        if($_POST['delplayername']!="defaultplayer"){
            
                 $sql="DELETE FROM players WHERE player_id='".$_POST['delplayername']."'";
                 echo $sql;
                 if($conn->query($sql) === TRUE) {
                    $delteamError="Sikeres admin törlés!<br>";
                    
              } else {
                $delteamError="Error: " . $sql . "<br>" . $conn->error;
              }
             }
         }else $addAdminError="Válassza ki az admint akit törölni akar.";
        }
        if (isset($_POST['addmatch'])) {
            if (isset($_POST['addresulth'])) {
                if (isset($_POST['addresulta'])) {
                if($_POST['addteamh']!="defaultteama"){
                    if($_POST['addteama']!="defaultteamh"){
                        $results=$_POST['addresulth']-$_POST['addresulta'];
                        echo $results;
                        $sql="INSERT INTO matches(hteam_id,ateam_id,result)
                        
                        VALUES('".$_POST['addteamh']."','".$_POST['addteama']."','".$_POST['addresulth']."-".$_POST['addresulta']."')";
                        if($conn->query($sql) === TRUE) {
                            $addteamError="Sikeres játékos hozzáadás!<br>";
                            
                        } else {
                            $addteamError="Nem létezik ilyen felhasználó";
                            
                        }
                }}
            }else $addteamError="Válassza ki a felhasználót akit teamná akar tenni.";
        }
    }
include "view/upload.php"
?>