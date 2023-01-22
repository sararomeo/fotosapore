<form action="insert-article.php" method="POST" enctype="multipart/form-data">
    <h2>Insert your new recipe</h2>
    <div class="mb-4 mt-4">
        <!-- Text input -->
        <div class="form-outline p-2">
            <label for="title">Title:</label><input type="text" class="form-control" id="title" name="title" />
        </div>
        <div class="form-outline p-2">
            <label for="caption">Caption:</label><textarea id="caption" class="form-control" name="caption"></textarea>
        </div>
        <div class="form-outline p-2">
            <label for="recipe">Recipe:</label><textarea id="recipe" class="form-control" name="recipe"></textarea>
        </div>
        <div class="form-outline p-2">
            <label for="imgarticle">Immagine Articolo</label><input type="file" name="imgarticle" id="imgarticle" />
        </div>

        <!-- Submit buttons -->
        <div class="d-flex justify-content-end">
            <input type="submit" name="submit"/>
            <a href="home.php">Annulla</a> <!-- modify link -->
        </div>
</form>