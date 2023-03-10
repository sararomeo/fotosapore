<div id="page-name" data-page="profile-page">
    <div class="profile-feed-container d-flex flex-column aligns-items-center p-2">
        <div class="profile-info align-self-center p-2">
            <?php
            $profileID = $templateParams["profileID"];
            $profileData = $dbh->getUserProfileInfo($profileID);
            $followers = $dbh->getFollowersCount($profileID)['followers'];
            $following = $dbh->getFollowingsCount($profileID)['following'];

            if ($profileID == $_SESSION['userID']) {
                $btnValue = "Edit profile";
            } else if ($dbh->isFollowing($profileID, $_SESSION['userID'])) {
                $btnValue = "Unfollow";
            } else {
                $btnValue = "Follow";
            }

            ?>
            <div class="d-flex justify-content-center">
                <h1 class="h1 p-1 text-center">
                    <?php echo $profileData['username']; ?>
                </h1>
            </div>
            <div class="d-flex justify-content-center">
                <p class="p-1 text-center">
                    <?php echo $profileData['bio']; ?>
                </p>
            </div>
        </div>

        <div class="profile-buttons p-2 align-self-center">
            <div class="profile-follow-count p-2 row justify-content-center">
                <div class="col">
                    <h3 class="h3 p-1 text-center change-followers-count">
                        <?php echo $followers; ?>
                    </h3>
                    <p class="lead p-1 text-center">Followers</p>
                </div>
                <div class="col">
                    <h3 class="h3 p-1 text-center">
                        <?php echo $following; ?>
                    </h3>
                    <p class="lead p-1 text-center">Following</p>
                </div>
            </div>
            <div class="action-btn-container p-2 d-flex justify-content-center">
                <form action="#" method="POST" name="login-form">
                    <input class="btn p-2 form-btn rounded" id="profile-btn" data-target="<?php echo $profileID; ?>"
                        type="button" value="<?= $btnValue ?>"></input>
                </form>
            </div>
        </div>


        <div class="row">
            <div class="col-xl-4 col-lg-3 col-md-2"></div>
            <div class="d-flex col-xl-4 col-lg-6 col-md-8 justify-content-center">
                <div class="scroll-container w-100" id="scroll-container">

                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-3 col-md-2"></div>
    </div>
</div>