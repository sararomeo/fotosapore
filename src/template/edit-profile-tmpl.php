<div id="page-name" data-page="profile-page">
    <div class="profile-feed-container d-flex flex-column aligns-items-center">
        <div class="profile-info align-self-center p-2">
            <?php
            $profileData = $dbh->getUserProfileInfo($_SESSION["userID"]);
            ?>

            <div class="d-flex justify-content-center">
                <div class="row">
                    <h1 class="h2 p-2 col-12">Edit your profile informations:</h1>
                </div>
            </div>

            <form action="elaborate-edit-profile.php" method="POST" enctype="multipart/form-data">

                <!-- user informations -->
                <div class="form-outline p-2">
                    <label for="username">Username:</label><input type="text" class="form-control" id="username"
                        name="username" required value="<?php echo ($profileData["username"]); ?>" />
                </div>

                <div class="form-outline p-2">
                    <label for="bio">Bio:</label>
                    <textarea id="bio" class="form-control " name="bio" required
                        rows="6"><?php echo ($profileData["bio"]); ?></textarea>
                </div>

                <!-- Submit buttons -->
                <div class="d-flex justify-content-center py-4">
                    <input class="form-btn align-right p-2 m-2 rounded" type="submit" value="Update profile" />
                </div>


            </form>
        </div>
    </div>
</div>