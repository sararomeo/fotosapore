<div id="page-name" data-page="notification-page">

    <div class="d-flex justify-content-center">
        <div class="feed">
            <div class="row">
                <?php foreach ($templateParams["notifications"] as $n): ?>
                    <div class="col-12">
                        <article>
                            <header>
                                <h2>
                                    <?php echo $n["text"] ?>
                                </h2>
                                <time datetime="<?php echo $n["time"] ?>">
                            </header>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>