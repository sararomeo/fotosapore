<div id="page-name" data-page="notification-page">
    <div class="row mb-4">
        <div class="col text-center">
            <h1>Notifications:</h1>
        </div>
    </div>


    <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                <div class="card-body p-4">
                    <?php foreach ($templateParams["notifications"] as $n): ?>
                        <div class="card mb-4">
                            <div class="card-body mx-4 my-4">
                                <h2 class="display-6">
                                    <?php echo $n["text"] ?>
                                </h2>
                                <p>
                                    <?php echo $n["text"] ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>