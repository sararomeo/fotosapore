<div id="page-name" data-page="search-page">
    <div class="d-flex justify-content-center">
        <div class = "">
            <?php if ($dbh->getSearchPosts($tagsString) == null): ?>
                <p class='text-center'>No post with such tag was found.</p>
            <?php endif;?>
            <div id="search-tag" data-target="<?php echo $tagsString; ?>">
            <div class = "scroll-container" id = "scroll-container">
            </div>
        </div>
    </div>
</div>