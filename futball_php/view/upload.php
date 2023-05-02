<div class="middle">

    <form action="index.php?page=upload" method="POST" >
    
        <h2>Új csapat hozzáadása:</h2>
        <input type="text" placeholder="Csapat neve" name="addteamname">
        <input type="text" placeholder="Menedzser neve" name="addteammanager">
        <input type="text" placeholder="Sportigazgató neve" name="addteamdirector">
        <input type="submit" name="teamadd"  value="Csapat hozzáadása"  id="submit">
        
        <h2>Csapat törlése:</h2>
        <label >Csapatok:</label>
            <select name="delteamname" id="cat" required>  
                <option disabled selected value="defaultteam">Válasszon csapatot!</option>
                <?php 
                $sql="SELECT team_id,team_name FROM teams";
                if(!$result = $conn->query($sql)) echo $conn->error;
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                            echo"<option value=".$row['team_id'].">".$row['team_name']."</option>";
                    }
                }
                ?>
            </select>
        
        <input type="submit" name="delteam"  value="Csapat törlése" id="submit">
        
    
        <h2>Új játékos hozzáadása:</h2>
        <input type="text" placeholder="Játékos neve" name="addplayername">
        <input type="text" placeholder="Játékos kora" name="addplayerage">
        <select name="addplayerteam" id="cat" required>  
                <option disabled selected value="defaultplayerteam">Válasszon csapatot!</option>
                <?php 
                $sql="SELECT team_id,team_name FROM teams";
                if(!$result = $conn->query($sql)) echo $conn->error;
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                            echo"<option value=".$row['team_id'].">".$row['team_name']."</option>";
                    }
                }
                ?>
            </select>
        <select name="positionname" id="cat" required>  
                <option disabled selected value="defaultposition">Válasszon pozíciót!</option>
                <?php 
                $sql="SELECT position_id,position_name FROM position";
                if(!$result = $conn->query($sql)) echo $conn->error;
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                            echo"<option value=".$row['position_id'].">".$row['position_name']."</option>";
                    }
                }
                ?>
            </select>
        <input type="submit" name="addplayer"  value="Játékos hozzáadása"  id="submit">
        <h2>Játékos törlése:</h2>
        <label >Játékosok:</label>
            <select name="delplayername" id="cat" required>  
                <option disabled selected value="defaultplayer">Válasszon játékost!</option>
                <?php 
                $sql="SELECT player_id,player_name FROM players";
                if(!$result = $conn->query($sql)) echo $conn->error;
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                            echo"<option value=".$row['player_id'].">".$row['player_name']."</option>";
                    }
                }
                ?>
            </select>
        
        <input type="submit" name="delplayer"  value="Játékos törlése" id="submit">


        <h2> Meccs feltöltése:</h2>
        
            <select name="addteamh" id="cat" required>  
                <option disabled selected value="defaultteamh">Válasszon csapatot!</option>
                <?php 
                $sql="SELECT team_id,team_name FROM teams";
                if(!$result = $conn->query($sql)) echo $conn->error;
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                            echo"<option value=".$row['team_id'].">".$row['team_name']."</option>";
                    }
                }
                ?>
            </select>

            <input type="text" placeholder="Hazai csapat" name="addresulth">
            <input type="text" placeholder="Vendég csapat" name="addresulta">
            <select name="addteama" id="cat" required>  
                <option disabled selected value="defaultteama">Válasszon csapatot!</option>
                <?php 
                $sql="SELECT team_id,team_name FROM teams";
                if(!$result = $conn->query($sql)) echo $conn->error;
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                            echo"<option value=".$row['team_id'].">".$row['team_name']."</option>";
                    }
                }
                ?>
            </select>

        <input type="submit" name="addmatch"  value="Meccs feltöltése" id="submit">

        </form>
            </div>
            
        
