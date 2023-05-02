<?php
class Matches {
    
    private $match_id;
    private $hteam_id;
    private $ateam_id;
    private $result;
    
    public function set_matches($match_id, $conn) {
        // adatbázisból lekérdezzük
        $sql = "SELECT match_id, hteam_id, ateam_id, result  FROM matches";
        $sql .= " WHERE match_id = $match_id ";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->match_id = $row['match_id'];
                $this->hteam_id = $row['hteam_id'];
                $this->ateam_id = $row['ateam_id'];
                $this->result = $row['result'];
               
                
            }
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // építsük fel az összes get metódust
    public function get_hteam_id() {
        return $this->hteam_id;
    }

    public function get_ateam_id() {
        return $this->ateam_id;
    }

    
    public function get_result() {
        return $this->result;
    }
    
    public function get_match_id() {
        return $this->match_id;
    }
    public function EredmenyLista($conn) {
        $lista = array();
        $sql = "SELECT match_id FROM matches";
        if($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
                    $lista[] = $row['match_id'];
                }
            }
        }
        return $lista;
    }   
}
?>