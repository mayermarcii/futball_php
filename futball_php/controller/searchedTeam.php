<?php
$_SESSION['searched_team_id']="";
$sql = "SELECT team_id FROM teams WHERE team_name = '".$_SESSION['search']."'";
    if(!$result = $conn->query($sql)) echo $conn->error;
    if ($result->num_rows > 0) {
        if($row = $result->fetch_assoc()) {
            $teams -> set_team($row['team_id'], $conn);
                $_SESSION['searched_team_id'] = $row['team_id'];
                $_SESSION['searched_team_name'] = $teams->get_team_name();
                
               
        }
    }


include 'view/searchedTeam.php';
    ?>