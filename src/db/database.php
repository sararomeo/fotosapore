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
     * Get user data from database to display on profile page
     * @param mixed $userID
     * @return mixed
     */
    public function getUserProfileInfo($userID)
    {
        $query = "SELECT username, bio, email FROM user WHERE userID = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }

    /**
     * Get user's followers count
     * @param mixed $userID
     * @return mixed
     */
    public function getFollowersCount($userID)
    {
        $query = "SELECT COUNT(*) AS followers FROM user u, followers f WHERE u.userID = f.user AND userID = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }

    /**
     * Get user's followers count
     * @param mixed $userID
     * @return mixed
     */
    public function getFollowingsCount($userID)
    {
        $query = "SELECT COUNT(*) AS following FROM user u, followers f WHERE u.userID = f.follower AND userID = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }

    /**
     * Check if user is following another user
     * @param mixed $userID
     * @param mixed $followerID
     * @return bool
     */
    public function isFollowing($profileID, $loggedUserID)
    {
        $query = "SELECT * FROM followers WHERE user = ? AND follower = ? LIMIT 1;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $profileID, $loggedUserID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    public function followUser($profileID, $loggedUserID)
    {
        $query = "INSERT INTO followers (user, follower) VALUES (?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $profileID, $loggedUserID);
        $stmt->execute();
    }

    public function unfollowUser($profileID, $loggedUserID)
    {
        $query = "DELETE FROM followers WHERE user = ? AND follower = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $profileID, $loggedUserID);
        $stmt->execute();
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


    private function getUsername($userID)
    {
        $query = "SELECT username FROM user WHERE userID = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }

    private function getEmail($userID)
    {
        $query = "SELECT email FROM user WHERE userID = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0]['email'];
    }

    private function getFollowersInformations($userID)
    {
        $query = "SELECT DISTINCT userID, email, username FROM user WHERE user.userID in (SELECT follower FROM followers WHERE user = ?);";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    private function getUserIDgivenPostID($postID)
    {
        $query = "SELECT userID FROM post WHERE postID = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $postID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0]['userID'];
    }

    /**
     *  Insert into the database and send an email notification to all the followers 
     *  when the user publish a post
     * @param mixed $userID the userID of the user that publish the post; 
     * @return void
     */
    public function insertPostNotifications($userID)
    {
        $followers = $this->getFollowersInformations($userID);
        $username = $this->getUsername($userID)['username'];
        $notificationText = $username . " has published a new post!";

        foreach ($followers as $follower) {
            $query = "INSERT INTO notification (userID, text) VALUES (? , ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("is", $follower['userID'], $notificationText);
            $stmt->execute();

            //call the function in notify-system for sending an email
            sendPostNotification($follower['email'], $username);
        }
    }

    /**
     *  Insert the notification into the database and send an email notification to the user
     * @param mixed $userID the userID of the user that publish the post; 
     * @param mixed $postID the postID of the post that the user has commented
     * @return void
     */
    public function insertCommentNotifications($userID, $postID)
    {
        $postPublisherID = $this->getUserIDgivenPostID($postID);
        $username = $this->getUsername($userID)['username'];
        $notificationText = $username . " has commented on your post!";

        $query = "INSERT INTO notification (userID, text) VALUES (? , ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("is", $postPublisherID, $notificationText);
        $stmt->execute();

        //call the function in notify-system for sending an email
        sendCommentNotification($this->getEmail($postPublisherID), $username);
    }

    /**
     * TO TEST 
     *  Insert the notification into the database and send an email notification to the user
     * @param mixed $userID the userID of the user that liked the post; 
     * @param mixed $postID the postID of the post that the user has liked; 
     * @return void
     */
    public function insertLikeNotifications($userID, $postID)
    {
        $postPublisherID = $this->getUserIDgivenPostID($postID);
        $username = $this->getUsername($userID)['username'];
        $notificationText = $username . " has liked on your post!";

        $query = "INSERT INTO notification (userID, text) VALUES (? , ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("is", $postPublisherID, $notificationText);
        $stmt->execute();

        //call the function in notify-system for sending an email
        sendLikeNotification($this->getEmail($postPublisherID), $username);
    }

    /**
     * TO TEST
     *  Insert the notification into the database and send an email notification to the user
     * @param mixed $followerID the userID of the user that liked the post; 
     * @param mixed $followedID the postID of the post that the user has liked; 
     * @return void
     */
    public function sendFollowNotification($followerID, $followedID)
    {        
        $username = $this->getUsername($followerID)['username'];
        $notificationText = $username . " has started following your profile!";

        $query = "INSERT INTO notification (userID, text) VALUES (? , ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("is", $followedID, $notificationText);
        $stmt->execute();

        //call the function in notify-system for sending an email
        sendFollowNotification($this->getEmail($followedID), $username);
    }

    /**
     *  Get all the notifications of a user
     * @param mixed $userID the userID of the user; 
     * @return array the array of notifications
     */
    public function getNotifications($userID)
    {
        $query = "SELECT time, text FROM notification WHERE userID = ? ORDER BY time DESC;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
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