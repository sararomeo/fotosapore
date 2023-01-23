<div id="page-name" data-page="profile-page">
    <div class="d-flex justify-content-center">
        <div class="profile-feed-container">
            <div class="profile-info">
                <?php
                $userIDtest = 1;
                $profileData = $dbh->getUserProfileInfo($userIDtest);
                $followers = $dbh->getFollowersCount($userIDtest)['followers'];
                $following = $dbh->getFollowingsCount($userIDtest)['following'];
                ?>
                <h1>Username:
                    <?php echo $profileData['username']; ?>
                </h1>
                <h2>Bio:
                    <?php echo $profileData['bio']; ?>
                </h2>
            </div>
            <div class="profile-follow-count">
                <h3>Followers:
                    <?php echo $followers; ?>
                </h3>
                <h3>Following:
                    <?php echo $following; ?>
                </h3>
            </div>
            <div class="feed">
                PROFILE OWNER FEED POSTS HERE
            </div>
        </div>
    </div>
</div>