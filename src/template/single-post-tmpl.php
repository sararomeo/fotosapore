<!-- post container -->
<div class="container-fluid shadow border border-secondary">

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
            <div class="row">
                <div class="col-md-5 col-sm-12 d-flex justify-content-center">
                    <img src="<?php echo UPLOAD_DIR . $templateParams["postInfo"]["imagePath"]; ?>" class="img-thumbnail"
                        alt="recipe result image" />
                </div>
        
                <div class="col-md-1"></div>
        
                <div class="col-md-6 col-sm-12">
                    <h2>Caption:</h2>
                    <p><?php echo $templateParams["postInfo"]["caption"];?></p>
                    
                    <h2>Recipe:</h2>
                    <p><?php echo $templateParams["postInfo"]["recipe"];?></p>

                    <h2>Tags:</h2>
                    <?php foreach($templateParams["postInfo"]["tagString"] as $tag):?>
                        <!-- <a href="search.php?myInput=<?php //echo $tag["tag"]; ?>"><?php //echo $tag["tag"];?></a> -->
                        <form action="search.php?myInput=<?php echo $tag["tag"]; ?>" class="search-box" method="POST">
                        <button type="submit" class="btn link-danger"><?php echo $tag["tag"];?></button>
                    </form>
                    <?php endforeach;?>

                </div>
        </section>
    </article>




    </div>
</div>