<form action="insert-article.php" method="POST" enctype="multipart/form-data">
    
    <div class="row">
        <div class="col-md-5">
            <h2>Insert your new recipe</h2>
            <!-- Text input -->
            <div class="form-outline p-2">
                <label for="title">Title:</label><input type="text" class="form-control" id="title" name="title" />
            </div>
            <div class="form-outline p-2">
                <label for="caption">Caption:</label><textarea id="caption" class="form-control "
                    name="caption" rows="6"> </textarea>
            </div>
            <div class="form-outline p-2">
                <label for="recipe">Recipe:</label><textarea id="recipe" class="form-control" name="recipe" rows="6"></textarea>
            </div>
        </div>

        <div class="col-md-7">
            <div class="form-outline p-2">
                <label for="imgarticle">Image</label><input type="file" name="imgarticle" id="imgarticle" />
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