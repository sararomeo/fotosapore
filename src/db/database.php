<?php
class DatabaseHelper
{
    private $db;

    /**
     * Constructor for DatabaseHelper class
     * @param mixed $servername
     * @param mixed $username
     * @param mixed $password
     * @param mixed $dbname
     * @param mixed $port
     */
    public function __construct($servername, $username, $password, $dbname, $port)
    {
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
    public function checkLogin($email, $pw)
    {
        $query = "SELECT email, password FROM user WHERE email = ? LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($db_email, $db_pw);
        $stmt->fetch();
        return password_verify($pw, $db_pw);
    }

    // Sign-up

    /**
     * Checks if email already exists in database
     * @param mixed $email
     * @return boolean
     */
    public function checkMailExists($email): bool
    {
        $query = "SELECT email FROM user WHERE email = ? LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($db_email);
        $stmt->fetch();
        return $db_email == $email;
    }

    /**
     * Register new user into database
     * @param mixed $email
     * @param mixed $username
     * @param mixed $password
     * @return void
     */
    public function signUp($email, $username, $password)
    {
        $bio = '';
        $query = "INSERT INTO user (email, username, password, bio) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssss", $email, $username, $password, $bio);
        $stmt->execute();
        $stmt->close();
    }

    /**
     * Get user data from database
     * @param mixed $email
     * @return mixed
     */
    public function getUserData($email)
    {
        $query = "SELECT userID, username FROM user WHERE email = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }

    /**
     * Register new post into database
     * @param mixed $title
     * @param mixed $caption
     * @param mixed $recipe
     * @param mixed $imagePath
     * @param mixed $userID
     * @return int|string
     */
    public function insertNewPost($title, $caption, $recipe, $imagePath, $userID)
    {
        $query = "INSERT INTO post (title, caption, recipe, imagePath, userID) VALUES (? , ?, ? , ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssssi", $title, $caption, $recipe, $imagePath, $userID);
        $stmt->execute();
        return $stmt->insert_id;
    }

    /**
     * Register new tag into database
     * @param mixed $postID
     * @param mixed $tag
     * @return bool
     */
    public function insertPostTags($postID, $tag)
    {
        $query = "INSERT INTO tags (postID, tag) VALUES (? , ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("is", $postID, $tag);
        return $stmt->execute();
    }

    /**
     * Send the home posts in JSON format.
     */
    public function getHomePosts() {
        $query ="SELECT u.username, p.title, p.caption, p.imagePath, p.recipe 
                FROM user u, followers f, post p 
                WHERE f.follower = ? 
                AND p.userID = f.user
                AND u.userID = f.user
                ORDER BY p.timestamp ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $_SESSION['userID']);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Send the discovery posts in JSON format.
     */
    public function getDiscoveryPosts() {
        $query ="SELECT u.username, p.title, p.caption, p.imagePath, p.recipe 
                FROM user u, post p 
                WHERE p.userID = u.userID 
                AND u.userID != ? 
                AND u.userID NOT IN (   SELECT f.user 
                                        FROM followers f 
                                        WHERE f.follower = ? )";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $_SESSION['userID'], $_SESSION['userID']);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Send the requested profile posts in JSON format. TODO
     */
    public function getProfilePosts() {
        $query ="SELECT u.username, p.title, p.caption, p.imagePath, p.recipe 
                FROM user u, post p 
                WHERE p.userID = u.userID 
                AND u.userID = ?  
                ORDER BY p.timestamp ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i",$_SESSION['userID']);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Send the post searched. TODO
     */
    public function getSearchPosts($tag) {
        $query ="SELECT u.username, p.title, p.caption, p.imagePath, p.recipe 
                FROM user u, post p, tags t 
                WHERE p.userID = u.userID 
                AND u.userID != ? 
                AND p.postID = t.postID 
                AND t.tag = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $_SESSION['userID'], $tag);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>