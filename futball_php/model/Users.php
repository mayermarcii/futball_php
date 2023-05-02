<?php
class Users {
    
    private $user_id;
    private $username;
    private $pw;
   
    private $email;
    
    public function set_user($user_id, $conn) {
        // adatbázisból lekérdezzük
        $sql = "SELECT user_id, username, pw, email  FROM user";
        $sql .= " WHERE user_id = $user_id ";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->user_id = $row['user_id'];
                $this->username = $row['username'];
                $this->pw = $row['pw'];
                $this->email = $row['email'];
               
                
            }
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // építsük fel az összes get metódust
    public function get_username() {
        return $this->username;
    }

    public function get_pw() {
        return $this->pw;
    }

    
    public function get_email() {
        return $this->email;
    }
    
    public function get_user_id() {
        return $this->user_id;
    }
    public function felhasznaloLista($conn) {
        $lista = array();
        $sql = "SELECT user_id FROM user";
        if($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
                    $lista[] = $row['user_id'];
                }
            }
        }
        return $lista;
    }   
}
?>