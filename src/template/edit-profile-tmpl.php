<div id="page-name" data-page="profile-page">
    <div class="profile-feed-container d-flex flex-column aligns-items-center">
        <div class="feed align-self-center">
            EDIT PROFILE HERE TO DO
        </div>
        <div class="profile-info align-self-center p-2">
            <?php
            $userIDtest = 1;
            $profileData = $dbh->getUserProfileInfo($userIDtest);
            $followers = $dbh->getFollowersCount($userIDtest)['followers'];
            $following = $dbh->getFollowingsCount($userIDtest)['following'];
            ?>
            <div class="d-flex justify-content-center">
                <h1 class="h1 p-1 text-center"><?php echo $profileData['username']; ?></h1>
            </div>
            <div class="d-flex justify-content-center">
                <h2 class="h2 p-1 text-center"><?php echo $profileData['bio']; ?></h2>
            </div>
        </div>

    </div>
</div>