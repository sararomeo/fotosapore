<div class="row" id="page-name" data-page="search-page">
    <div class="col-md-4"></div>
    <div class="d-flex col-md-4 justify-content-center">
        <div class="scroll-container w-100" id="scroll-container">
            <?php if ($dbh->getSearchPosts($tagsString) == null): ?>
                <p class='text-center'>No post with such tag was found.</p>
            <?php endif; ?>
            <div id="search-tag" data-target="<?php echo $tagsString; ?>">
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>