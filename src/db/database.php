<?php
class DatabaseHelper
{
    private $db;

    /**
     * Constructor for DatabaseHelper class
     * @param string $servername
     * @param string $username
     * @param string $password
     * @param string $dbname
     * @param int $port
     * @return void
     */
    public function __construct($servername, $username, $password, $dbname, $port)
    {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    // Log-in

    /**
     * Checks if user exists in database in order to log in
     * @param string $email
     * @param string $pw
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
     * @param string $email
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
     * @param string $email
     * @param string $username
     * @param string $password
     * @return void
     */
    public function signUp($email, $username, $password)
    {
        $bio = '';
        $query = "INSERT INTO user (email, username, password, bio) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssss", $email, $username, $password, $bio);
        return $stmt->execute();
    }

    /**
     * Get user data from database
     * @param string $email
     * @return array
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
     * @param int $userID
     * @return array
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
     * @param int $userID
     * @return array
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
     * @param int $userID
     * @return array
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
     * @param int $profileID
     * @param int $loggedUserID
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

    /**
     * Register if user follow another user
     * @param int $profileID
     * @param int $loggedUserID
     * @return array
     */
    public function followUser($profileID, $loggedUserID)
    {
        $query = "INSERT INTO followers (user, follower) VALUES (?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $profileID, $loggedUserID);
        $stmt->execute();
    }

    /**
     * Register if user unfollow another user
     * @param int $profileID
     * @param int $loggedUserID
     * @return array
     */
    public function unfollowUser($profileID, $loggedUserID)
    {
        $query = "DELETE FROM followers WHERE user = ? AND follower = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $profileID, $loggedUserID);
        $stmt->execute();
    }

    /**
     * Register new post into database
     * @param string $title
     * @param string $caption
     * @param string $recipe
     * @param string $imagePath
     * @param int $userID
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
     * @param int $postID
     * @param string $tag
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
     * Get username from userID
     * @param int $userID
     * @return array
     */
    public function getUsername($userID)
    {
        $query = "SELECT username FROM user WHERE userID = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }

    /**
     * Get email from userID
     * @param int $userID
     * @return array
     */
    private function getEmail($userID)
    {
        $query = "SELECT email FROM user WHERE userID = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0]['email'];
    }

    /**
     * Get user's followers informations
     * @param int $userID
     * @return array
     */
    private function getFollowersInformations($userID)
    {
        $query = "SELECT DISTINCT userID, email, username FROM user WHERE user.userID in (SELECT follower FROM followers WHERE user = ?);";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Find user who published post by postID.
     * @param int $postID
     * @return array
     */
    public function getUserIDgivenPostID($postID)
    {
        $query = "SELECT userID FROM post WHERE postID = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $postID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0]['userID'];
    }

    /**
     * Insert into the database and send an email notification to all the followers 
     * when the user publish a post
     * @param int $userID the userID of the user that publish the post;
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
     * @param int $userID the userID of the user that publish the post; 
     * @param int $postID the postID of the post that the user has commented
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
     * @param int $userID the userID of the user that liked the post; 
     * @param int $postID the postID of the post that the user has liked; 
     * @return void
     */
    public function insertLikeNotifications($userID, $postID)
    {
        $postPublisherID = $this->getUserIDgivenPostID($postID);
        $username = $this->getUsername($userID)['username'];
        $notificationText = $username . " liked your post!";

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
     * @param int $followerID the userID of the user that liked the post; 
     * @param int $followedID the postID of the post that the user has liked; 
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
     * @param int $userID the userID of the user; 
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
     * @return void
     */
    public function getHomePosts()
    {
        $query = "SELECT u.username, p.title, p.caption, p.imagePath, p.recipe, p.postID, p.userID
                FROM user u, followers f, post p 
                WHERE f.follower = ? 
                AND p.userID = f.user
                AND u.userID = f.user
                ORDER BY p.timestamp DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $_SESSION['userID']);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Send the discovery posts in JSON format.        
     * @return void
     */
    public function getDiscoveryPosts()
    {
        $query = "SELECT u.username, p.title, p.caption, p.imagePath, p.recipe, p.postID, p.userID
                FROM user u, post p 
                WHERE p.userID = u.userID 
                AND u.userID != ? 
                AND u.userID NOT IN (   SELECT f.user 
                                        FROM followers f 
                                        WHERE f.follower = ? )
                ORDER BY p.timestamp DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $_SESSION['userID'], $_SESSION['userID']);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Send the requested profile posts in JSON format.
     * @param int $profileID the userID of the profile;
     * @return void
     */
    public function getProfilePosts($profileID)
    {
        $query = "SELECT u.username, p.title, p.caption, p.imagePath, p.recipe, p.postID, p.userID
                FROM user u, post p 
                WHERE p.userID = u.userID 
                AND u.userID = ?  
                ORDER BY p.timestamp DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $profileID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Search by given tags.
     * @param string $tagsString the tags to search for;
     * @return void
     */
    public function getSearchPosts($tagsString)
    {
        $tags = explode(" ", $tagsString);
        $tags = array_unique($tags);
        array_push($tags, $_SESSION['userID']);
        $paramsTypes = str_repeat('s', count($tags) - 1) . 'i';
        $questionMarks = str_repeat('?,', count($tags) - 2) . '?';

        $query = "SELECT u.username, p.title, p.caption, p.imagePath, p.recipe, p.postID, p.userID
        FROM post p, user u, (SELECT tags.postID, COUNT(*) as ntag 
                                FROM tags
                                WHERE tag in ($questionMarks)
                                group by postID) AS m
        WHERE p.postID = m.postID 
        AND u.userID = p.userID 
        AND u.userID != ?
        ORDER BY m.ntag DESC";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param($paramsTypes, ...$tags);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    /**
     * Update the username and bio of the current session user
     * @param string $newUsername the new username of the user   
     * @param string $newBio the new bio of the user
     * @return bool
     */
    public function updateUserData($newUsername, $newBio)
    {
        $query = "UPDATE user SET username = ? , bio = ? WHERE userID = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssi", $newUsername, $newBio, $_SESSION['userID']);
        return $stmt->execute();
    }

    /**
     * Get post by postID
     * @param int $postID the postID of the post
     * @return array
     */
    public function getPostByID($postID)
    {
        $query = "SELECT title, timestamp, caption, recipe, imagePath, userID  FROM  post  WHERE postID = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $postID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }

    /**
     * Get tags by postID
     * @param int $postID the postID of the post
     * @return array
     */
    public function getTagByPost($postID)
    {
        $query = "SELECT tag FROM  tags WHERE postID = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $postID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Get comments by postID
     * @param int $postID the postID of the post
     * @return array
     */
    public function getCommentsByPost($postID)
    {
        $query = "SELECT c.commentID, c.commentText, c.timestamp, u.username 
        FROM post AS p, comment AS c, user AS u 
        WHERE p.postID = c.postID 
        AND c.userID = u.userID 
        AND p.postID = ?
        ORDER BY timestamp DESC; ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $postID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Insert a new comment in the database
     * @param int $postID the postID of the post
     * @param string $commentText the text of the comment
     * @return void
     */
    public function insertComment($postID, $commentText)
    {
        $query = "INSERT INTO comment (commentText, userID, postID) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sii", $commentText, $_SESSION["userID"], $postID);
        $stmt->execute();

        $this->insertCommentNotifications($_SESSION["userID"], $postID);
    }

    /**
     * Check if the user has already liked the post
     * @param int $userID the userID of the user
     * @param int $postID the postID of the post
     * @return array
     */
    public function isPostLiked($userID, $postID) {
        $query = "SELECT userID, postID FROM likes WHERE userID = ? AND postID = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $userID, $postID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Add new like at given post from a user.
     * @param int $userID
     * @param int $postID
     * @return void
     */
    public function likePost($userID, $postID)
    {
        $query = "INSERT INTO likes (userID, postID) VALUES (?, ?);";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $userID, $postID);
        $stmt->execute();
    }

    /**
     * Remove like at given post from a user.
     * @param int $userID
     * @param int $postID
     * @return void
     */
    public function dislikePost($userID, $postID)
    {
        $query = "DELETE FROM likes WHERE userID = ? AND postID = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $userID, $postID);
        $stmt->execute();
    }

    /**
     * Delete post by postID.
     * @param int $postID
     * @return void
     */
    public function deletePost($postID)
    {
        $query = "DELETE FROM post WHERE postID = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $postID);
        $stmt->execute();
    }

    /**
     * Get the like number from a post
     * @param int $postID
     * @return int
     */
    public function likeNumber($postID){ 
        $query = "SELECT count(userID) as likeNum FROM likes WHERE postID = ? GROUP BY postID; ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $postID);
        $stmt->execute();
        $result = $stmt->get_result();
        $res = $result->fetch_all(MYSQLI_ASSOC);
        
        if(count($res) == 0){ 
            $likes = 0;
        }else{
            $likes = $res[0]["likeNum"];
        }
        return $likes; 
    }

}

?>