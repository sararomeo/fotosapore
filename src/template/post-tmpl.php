<div class="container-fluid">
    <div class="col-md d-flex flex-column align-items-left justify-content-center form-text-area p-2">
        <?php
        if(isset($templateParams["msg"])){
            require("display-post-error.php"); 
        }
        require("post-form.php");
        if (isset($templateParams["msg"])) {
            unset($templateParams["msg"]);
            unset($templateParams["postTitle"]);
            unset($templateParams["caption"]);
            unset($templateParams["recipe"]);
            unset($templateParams["tagString"]);
        }
        ?>
    </div>
</div>