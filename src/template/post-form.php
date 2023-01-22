<form action="insert-article.php" method="POST" enctype="multipart/form-data">
    <h2>Insert a new post</h2>
    <div class="mb-4 mt-4">
        <!-- Text input -->
        <div class="form-outline p-2">
            <label for="title">Title:</label><input type="text" class="form-control" id="title" name="title" value="" />
        </div>
        <div class="form-outline p-2">
            <label for="text">Text:</label><textarea id="text" class="form-control" name="text"></textarea>
        </div>
        <div class="form-outline p-2">
            <label for="anteprimaarticolo">Anteprima Articolo:</label><textarea id="anteprimaarticolo" class="form-control" name="anteprimaarticolo"></textarea>
        </div>
        <div class="form-outline p-2">
            <label for="imgarticolo">Immagine Articolo</label><input type="file" name="imgarticolo" id="imgarticolo" />
        </div>
        <div class="form-outline p-2">
            <?php foreach ($templateParams["categorie"] as $categoria): ?>
                <input type="checkbox" id="<?php echo $categoria["idcategoria"]; ?>"
                    name="categoria_<?php echo $categoria["idcategoria"]; ?>" /><label
                    for="<?php echo $categoria["idcategoria"]; ?>"><?php echo $categoria["nomecategoria"]; ?></label>
            <?php endforeach; ?>
        </div>

        <!-- Submit buttons -->
        <div class="d-flex justify-content-end">
            <input type="submit" name="submit" value="<?php echo getAction($_GET["action"]); ?> Articolo" />
            <a href="login.php">Annulla</a>
        </div>
        <input type="hidden" name="action" value="<?php echo $_GET["action"]; ?>" />
</form>