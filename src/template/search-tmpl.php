<div class="row" id="page-name" data-page="search-page">
    <div class="col-xl-4 col-lg-3 col-md-2"></div>
    <div class="d-flex col-xl-4 col-lg-6 col-md-8 justify-content-center">
        <div class="scroll-container w-100" id="scroll-container">
            <?php if ($dbh->getSearchPosts($tagsString) == null): ?>
                <p class='text-center'>No post with such tag was found.</p>
            <?php endif; ?>
            <div id="search-tag" data-target="<?php echo $tagsString; ?>">
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-3 col-md-2"></div>
</div>