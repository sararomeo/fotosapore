<div id="page-name" data-page="search-page">
    <div class="d-flex justify-content-center">
        <div class = "scroll-container" id = "scroll-container">
            <?php
            if (!isset($_POST['myInput'])) {
                //header("location: ../index.php");
            } else {
                $tagsString = $_POST['myInput'];
                if($tagsString == "") {
                    //header("location: ../index.php");
                } else {
                    $tags = explode(" ", $tagsString);
                    $tags = array_unique($tags); 
                    $dbh->getSearchPosts($tags);                  
                }
            }
            ?>

            <?php if ($dbh->getSearchPosts($tags) == null): ?>
                <p class='text-center'>No post with such tag was found.</p>
            <?php endif;?>
        </div>
    </div>
</div>