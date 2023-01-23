<div id="page-name" data-page="profile-page">
    <div class="profile-feed-container d-flex flex-column aligns-items-center">
        <div class="profile-info align-self-center p-2">
            <?php
            $userIDtest = 1;
            $profileData = $dbh->getUserProfileInfo($userIDtest);
            $followers = $dbh->getFollowersCount($userIDtest)['followers'];
            $following = $dbh->getFollowingsCount($userIDtest)['following'];

            if($userIDtest == $_SESSION['userID']) {
                $btnValue = "Edit profile";
            } else if ($dbh->isFollowing($userIDtest, $_SESSION['userID'])) {
                $btnValue = "Unfollow";
            } else {
                $btnValue = "Follow";
            }

            ?>
            <div class="d-flex justify-content-center">
                <h1 class="h1 p-1 text-center"><?php echo $profileData['username']; ?></h1>
            </div>
            <div class="d-flex justify-content-center">
                <h2 class="h2 p-1 text-center"><?php echo $profileData['bio']; ?></h2>
            </div>
        </div>

        <div class="profile-buttons p-2 align-self-center">
            <div class="profile-follow-count p-2 row justify-content-center">
                <div class="col">
                <h3 class="h3 p-1 text-center change-followers-count"><?php echo $followers; ?><h3>
                <p class="lead p-1 text-center">Followers</p>
                </div>
                <div class="col">
                <h3 class="h3 p-1 text-center"><?php echo $following; ?><h3>
                <p class="lead p-1 text-center">Following</p>
                </div>
            </div>
            <div class="action-btn-container p-2 d-flex justify-content-center">
                <form action="#" method="POST" name="login-form">
                <input class="btn p-2 action-btn profile-btn" id="profile-btn" data-target="<?php echo $userIDtest; ?>" type="button" value="<?= $btnValue ?>"></input>
                </form>
            </div>
        </div>


        <div class="feed align-self-center">
            PROFILE OWNER FEED POSTS HERE
        </div>
    </div>
</div>