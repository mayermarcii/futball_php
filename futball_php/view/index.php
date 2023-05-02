

<?php 

	echo"<div class='flex-container' id='flex-con'>";
   
    
if ($matchesIds) {
    foreach($matchesIds as $matchesId) {
    $matches->set_matches($matchesId,$conn);
    $sql="SELECT match_id FROM matches WHERE match_id=".$matchesId." ";
        if(!$result = $conn->query($sql)) echo $conn->error;
        if($result->num_rows > 0){
            $sql="SELECT team_name FROM matches INNER JOIN teams ON matches.hteam_id=teams.team_id WHERE match_id=".$matchesId." ";
            if(!$result = $conn->query($sql)) echo $conn->error;
            if($result->num_rows > 0){
                foreach($result->fetch_assoc() as $row){
                    echo "<div class='keret'><a href='index.php?page=searchedTeam&searched=".$row. " '>".$row."</a>";
                   }
            }else{
                echo'';
        }
        $sql="SELECT result FROM matches WHERE match_id=".$matchesId." ";
        if(!$result = $conn->query($sql)) echo $conn->error;
            if($result->num_rows > 0){
                foreach($result->fetch_assoc() as $row){
                    echo $row. " ";
                   }
            }else{
                echo'';
        }
            $sql="SELECT team_name FROM matches INNER JOIN teams ON matches.ateam_id=teams.team_id WHERE match_id=".$matchesId." ";
            if(!$result = $conn->query($sql)) echo $conn->error;
            if($result->num_rows > 0){
                foreach($result->fetch_assoc() as $row){
                    echo "<a href='index.php?page=searchedTeam&searched=".$row. " '>".$row."</a><br><br></div>";
                   }
            }else{
                echo'';
        }
    
    }
    }   
    }   
echo"</div>";
?>

      
    