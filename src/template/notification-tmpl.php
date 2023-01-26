<div id="page-name" data-page="notification-page">
    <div class="row">
        <div class="col text-center">
            <h1>Notifications:</h1>
        </div>
    </div>

    <div class="row d-flex justify-content-center mb-2 p-2">
        <div class="col-md-2"></div>
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                <div class="card-body p-4">
                    <?php foreach ($templateParams["notifications"] as $n): ?>
                        <div class="card my-4">
                            <div class="notification-text card-body mx-4 my-4">
                                <p class="lead fa-2x">
                                    <?php echo $n["text"] ?>
                                </p>
                                <p class="text-muted">
                                    <?php echo date($n["time"]) ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>