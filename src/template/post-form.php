
<form action="elaborate-article.php" method="POST" enctype="multipart/form-data">


<div class="row">
    <!-- image input -->
    <div class="col-md-7">
        <h2>Insert a photo</h2>
        <div class="form-outline p-2 mt-3">
            <label for="imgarticle">Image</label><input type="file" name="imgarticle" id="imgarticle"
                accept="image/jpeg, image/png" required/>
        </div>
    </div>

    
    <!-- Text input -->
    <div class="col-md-5">
        <h2>Insert your new recipe</h2>
        <div class="form-outline p-2">
            <label for="title">Title:</label><input type="text" class="form-control" id="title" name="title" required
            value=  "<?php 
                        if(isset($templateParams["postTitle"])){
                            echo ($templateParams["postTitle"]);
                        }
                        ?>"
            />
        </div>

        <div class="form-outline p-2">
            <label for="caption">Caption:</label>
            <textarea id="caption" class="form-control " name="caption" required
            rows="6"><?php 
                    if(isset($templateParams["caption"])){
                        echo ($templateParams["caption"]);
                    }
                ?></textarea>
        </div>
        <div class="form-outline p-2">
            <label for="recipe">Recipe:</label><textarea id="recipe" class="form-control" name="recipe" required
            rows="6"><?php 
                        if(isset($templateParams["recipe"])){
                            echo ($templateParams["recipe"]);
                        }
                    ?></textarea>
        </div>
        <div class="form-outline p-2">
            <label for="tags">Tags:</label><textarea id="tags" class="form-control" name="tags" required
            rows="2"><?php 
                    if(isset($templateParams["tagString"])){
                        echo ($templateParams["tagString"]);
                    }
                ?></textarea>
        </div>
    </div>


</div>

<!-- Submit buttons -->
<div class="row mt-5">
    <div class="d-flex justify-content-start ">
        <button type="submit" class="btn btn-primary">Publish post</button>
    </div>
</div>

</form>