<div class="container-fluid">
    <div class="col-md p-4 d-flex flex-column align-items-left justify-content-center form-text-area">

        <?php
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