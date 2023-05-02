<?php
class Players {
    
    private $player_id;
    private $team_id;
    private $age;
    private $position;
    private $player_name;
    
    public function set_player($player_id, $conn) {
        // adatbázisból lekérdezzük
        $sql = "SELECT player_id, team_id, age, position, player_name  FROM players";
        $sql .= " WHERE player_id = $player_id ";
        $position = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($position->num_rows > 0) {
                $row = $position->fetch_assoc();
                $this->player_id = $row['player_id'];
                $this->team_id = $row['team_id'];
                $this->age = $row['age'];
                $this->position = $row['position'];
                $this->player_name = $row['player_name'];
                
            }
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // építsük fel az összes get metódust
    public function get_team_id() {
        return $this->team_id;
    }

    public function get_player_age() {
        return $this->age;
    }

    
    public function get_player_position() {
        return $this->position;
    }
    
    public function get_player_id() {
        return $this->player_id;
    }
    public function get_player_name() {
        return $this->player_name;
    }

    public function jatekosokLista($conn) {
        $lista = array();
        $sql = "SELECT player_id FROM players";
        if($position = $conn->query($sql)) {
            if ($position->num_rows > 0) {
				while($row = $position->fetch_assoc()) {
                    $lista[] = $row['player_id'];
                }
            }
        }
        return $lista;
    }   
}
?>