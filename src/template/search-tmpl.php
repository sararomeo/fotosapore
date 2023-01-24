<div id="page-name" data-page="search-page">
    <div class="d-flex justify-content-center">
        <div class = "scroll-container" id = "scroll-container">
            OK SONO NEL RISULTATO DELLA RICERCA
            <?php
            if (!isset($_POST['myInput'])) {
                //header("location: ../index.php");
            } else {
                $tagsString = $_POST['myInput'];
                if($tagsString == "") {
                    //header("location: ../index.php");
                } else {
                    $tags = explode(" ", $tagsString);
                    $tags = array_unique($tags); 
                    $dbh->getSearchPosts($tags);
                }

                
            }
            // var_dump($_POST['myInput']);
            // $tags = $_POST['myInput'];




            ?>
        </div>
    </div>
</div>