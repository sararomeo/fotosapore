<!-- post container -->
<div class="container-fluid ">

    <article>
        <!-- article title -->
        <header>
            <div class="row">
                <div class="col-md-2 col-1"></div>
                <div class="col-md-8 col-10">
                    <h1 class="h1 text-center">
                        <?php echo ($templateParams["postInfo"]["title"]) ?>
                    </h1>
                </div>
                <div class="col-md-2 col-1"></div>
            </div>
        </header>

        <section>
            <div class="row mt-4">
                <div class="col-md-5 col-sm-12 d-flex justify-content-center mb-4">
                    <img src="<?php echo UPLOAD_DIR . $templateParams["postInfo"]["imagePath"]; ?>"
                        class="img-thumbnail" alt="recipe result image" />
                </div>

                <div class="col-1"></div>

                <div class="col-md-6 col-sm-11">
                    <h2>Caption:</h2>
                    <p>
                        <?php echo $templateParams["postInfo"]["caption"]; ?>
                    </p>

                    <h2>Recipe:</h2>
                    <p>
                        <?php echo $templateParams["postInfo"]["recipe"]; ?>
                    </p>

                    <h2>Tags:</h2>
                    <?php foreach ($templateParams["postInfo"]["tagString"] as $tag): ?>
                        <!-- <a href="search.php?inputTag=<?php //echo $tag["tag"]; ?>"><?php //echo $tag["tag"];?></a> -->
                        <div class="float-start">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <form action="search.php?inputTag=<?php echo $tag["tag"]; ?>" class="search-box"
                                        method="POST">
                                        <button type="submit" class="btn link-danger">
                                            <?php echo $tag["tag"]; ?>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </article>
</div>

<div class="container-fluid mt-3">

    <!-- TODO fix forum for insert a comment -->
    <form action="elaborate-comment.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-2 col-1"></div>
            <div class="col-md-8 col-10">

                <div class="d-flex flex-start w-100">
                    <div class="form-outline w-100">
                        <label for="commentText">New comment:</label>
                        <textarea id="commentText" class="form-control " name="commentText" required rows="2"><?php
                        ?></textarea>
                    </div>
                </div>

                <input type="hidden" name="postID" value="<?php echo $templateParams["postID"]; ?>" />

                <div class="float-end mt-2 pt-1">
                    <input class="form-btn align-right p-2 mt-2 rounded" type="submit" value="Publish comment" />
                </div>
            </div>
            <div class="col-md-2 col-1"></div>
        </div>
    </form>
</div>


<div class="container-fluid">

    <div class="row mb-4">
        <div class="col text-center">
            <h2>Post comments:</h2>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                <div class="card-body p-4">
                    <?php foreach ($templateParams["postComments"] as $comment): ?>
                        <div class="card my-4">
                            <div class="card-body mx-4 my-4">
                                <p> 
                                    <?php echo $comment["commentText"] ?>
                                </p>
                                <p class="align-right">
                                    <?php echo date($comment["timestamp"]) ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>