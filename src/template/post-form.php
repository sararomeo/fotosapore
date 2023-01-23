<form action="elaborate-article.php" method="POST" enctype="multipart/form-data">

    <div class="row">

        <!-- image input -->
        <div class="col-md-7">
            <h2>Insert a photo</h2>
            <div class="form-outline p-2 mt-3">
                <label for="imgarticle">Image</label><input type="file" name="imgarticle" id="imgarticle"
                    accept="image/jpeg, image/png" />
            </div>
        </div>

        
        <!-- Text input -->
        <div class="col-md-5">
            <h2>Insert your new recipe</h2>
            <div class="form-outline p-2">
                <label for="title">Title:</label><input type="text" class="form-control" id="title" name="title" />
            </div>
            <div class="form-outline p-2">
                <label for="caption">Caption:</label><textarea id="caption" class="form-control " name="caption"
                    rows="6"> </textarea>
            </div>
            <div class="form-outline p-2">
                <label for="recipe">Recipe:</label><textarea id="recipe" class="form-control" name="recipe"
                    rows="6"></textarea>
            </div>
            <div class="form-outline p-2">
                <label for="tags">Tags:</label><textarea id="tags" class="form-control" name="tags"
                    rows="2"></textarea>
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