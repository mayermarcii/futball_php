
<?php 
if (!empty($_SESSION['searched_team_id'])) {
    echo '<h2>'.$_SESSION['searched_team_name'].'</h2><div class="flex-container">';
    
    if ($playersIds) {
        foreach($playersIds as $playersId) {
        $players->set_player($playersId,$conn);
        $sql="SELECT player_id FROM players WHERE player_id=".$playersId." and team_id=".$_SESSION['searched_team_id']." ";
            if(!$result = $conn->query($sql)) echo $conn->error;
            if($result->num_rows > 0){
                $sql="SELECT position_name FROM players Inner join position on position.position_id=players.position WHERE position_id=".$players->get_player_position()." and player_id=".$players->get_player_id()." ";
                if(!$rs = $conn->query($sql)) echo $conn->error;
                if($rs->num_rows > 0){
                    while($row = $rs->fetch_assoc()){
                        
                echo '<div class="keret">Játékos neve: '.$players->get_player_name().  '<br>Kor: '.$players->get_player_age().'<br>Pozíció: '.$row['position_name'].'</div><br>';
                }}
                
            
        
        }
        }   
        } 
        echo'</div>';
}

    elseif(!empty($_SESSION['search'])){
    
        
        echo "Erre gondolt:<br> ";
        
   
            $stmt=mysqli_prepare($conn,"SELECT team_name FROM teams WHERE team_name LIKE ?");
            if(isset($_REQUEST['searched'])){
            

            $stmt->bind_param('s', $nev); 
            $nev = "%".$_REQUEST['searched']."%";
            $stmt->execute();
            
                if($result = $stmt->get_result()){
                
                    if ($result->num_rows > 0 ){
                        
                                    
                                while($row = $result->fetch_assoc()){
                                    $sql="";
                                    echo "\t <a href='index.php?page=searchedTeam&searched=".$row['team_name']."'>".$row['team_name']."<br>";
                                }
                            }
                        }
                    
                } else echo "Ehhez hasonló név nem szerepel az adatbazisban";
        
            }

            

?>