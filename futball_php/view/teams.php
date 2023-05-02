<div class='flex-container' id='flex-con'>
<?php

if ($teamIds) {
    foreach($teamIds as $teamsId) {
    $teams->set_team($teamsId,$conn);
    $sql="SELECT team_id FROM teams WHERE team_id=".$teamsId." ";
        if(!$result = $conn->query($sql)) echo $conn->error;
        if($result->num_rows > 0){
            $sql="SELECT team_name FROM teams  WHERE team_id=".$teamsId." ";
            
            if(!$result = $conn->query($sql)) echo $conn->error;
            if($result->num_rows > 0){
                foreach($result->fetch_assoc() as $row){
                    echo '<div class="keret"><a href="index.php?page=searchedTeam&searched='.$teams->get_team_name().'">'.$teams->get_team_name().'</a></div><br>';
                   }
            }else{
                echo'';
        }
        
    
    }
    }   
    } 
?>  
        </div>    


