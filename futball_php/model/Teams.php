<?php
class teams {
    
    private $team_id;
    private $team_name;
    private $manager;
    private $director;
    
    public function set_team($team_id, $conn) {
        // adatbázisból lekérdezzük
        $sql = "SELECT team_id, team_name, manager, director  FROM teams";
        $sql .= " WHERE team_id = $team_id ";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->team_id = $row['team_id'];
                $this->team_name = $row['team_name'];
                $this->manager = $row['manager'];
                $this->director = $row['director'];
               
                
            }
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // építsük fel az összes get metódust
    public function get_team_name() {
        return $this->team_name;
    }

    public function get_manager() {
        return $this->manager;
    }

    
    public function get_director() {
        return $this->director;
    }
    
    public function get_team_id() {
        return $this->team_id;
    }
    public function CsapatLista($conn) {
        $lista = array();
        $sql = "SELECT team_id FROM teams";
        if($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
                    $lista[] = $row['team_id'];
                }
            }
        }
        return $lista;
    }   
}
?>