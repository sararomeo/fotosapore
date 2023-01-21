<?php
class DatabaseHelper{
    private $db;

    /**
     * Constructor for DatabaseHelper class
     * @param mixed $servername
     * @param mixed $username
     * @param mixed $password
     * @param mixed $dbname
     * @param mixed $port
     */
    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }

    // Log-in

    /**
     * Checks if user exists in database in order to log in
     * @param mixed $email
     * @param mixed $pw
     * @return bool
     */
    public function checkLogin($email, $pw) {
        $query = "SELECT email, password FROM user WHERE email = ? LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($db_email,$db_pw);
        $stmt->fetch();        
        return password_verify($pw, $db_pw);
    }

    // Sign-up

    /**
     * Checks if email already exists in database
     * @param mixed $email
     * @return boolean
     */
    public function checkMailExists($email) : bool {
        $query = "SELECT email FROM user WHERE email = ? LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($db_email);
        $stmt->fetch();        
        return $db_email==$email;
    }

    /**
     * Register new user into database
     * @param mixed $email
     * @param mixed $username
     * @param mixed $password
     * @return void
     */
    public function signUp($email, $username, $password) {
        $bio = '';
        $query = "INSERT INTO user (email, username, password, bio) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssss", $email, $username, $password, $bio);
        $stmt->execute();
        $stmt->close();
    }

    public function getUsername($email){ 
        $query = "SELECT username FROM user WHERE email = ?;";  
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0]["username"]; 
    }

}
?>