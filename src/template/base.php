<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap, icon, font-awesome, jsBootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css"
        integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <!-- Default title bar with icon -->
    <link rel="shortcut icon" href="res/favicon.ico" type="image/x-icon" />
    <title>
        <?php echo $templateParams["title"]; ?>
    </title>
</head>

<body>
    <div class="d-flex flex-column vh-100">
        <!-- Header -->
        <header>
            <!-- Navigation bar -->
            <div class="container row">
                <nav class="col-12 py-2 navbar navbar-expand-lg navbar-default fixed-top navbar-static-top bg-white navbar-sticky"
                    id="navbar-container" aria-label="main">
                    <div class="container-fluid overflow-hidden">
                        <!-- Left elements -->
                        <div class="d-flex my-2 my-sm-0">
                            <!-- Logo that leads to home page -->
                            <a class="navbar-brand ms-2 me-2 d-flex align-items-center" href="./home.php"><img
                                    src="res/big-favicon.png" height="40" alt="logo fotosapore" loading="lazy" /></a>
                            <!-- Search form -->
                            <div class="position-relative search-container">
                                <form action="search.php" class="search-box" role="search" method="POST" id="nav-search-form"
                                    enctype="multipart/form-data">
                                    <label for="inputTag" hidden>search bar</label>
                                    <input type="search" id="inputTag" class="input search-input"
                                        name="inputTag" value="" autocomplete="off"
                                        placeholder="Search for a recipe...">
                                    <button type="button" onclick="document.getElementById('inputTag').value = ''"
                                        class="btn search-btn" name="button" id="search-btn"></button>
                                </form>
                            </div>
                        </div>

                        <!-- toggler -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-controls="navbarScroll"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"><i class="bi bi-list"></i></span>
                        </button>

                        <!-- Right elements to collapse -->
                        <div class="collapse navbar-collapse" id="navbarScroll">

                            <div class="float-end">
                                <ul class="navbar-nav flex-row navbar-nav-scroll list-inline" id="nav-list">
                                    <!-- Go back to previous page -->
                                    <li class="nav-item">
                                        <label hidden>Go back to previous page</label>
                                        <button class="back-btn shadow-none" type="button" id="go-back-btn">
                                            <span class="d-flex align-items-center"><i
                                                    class="bi bi-arrow-left-circle fa-fw nav-bar-icon"></i></span></button>
                                    </li>
                                    <!-- Home -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="./home.php" id="home-nav-link" title="home">
                                            <span class="d-flex align-items-center"><i
                                                    class="bi bi-house fa-fw nav-bar-icon" alt="home icon"></i></span>
                                        </a>
                                    </li>
                                    <!-- Discovery -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="./discovery.php" id="discovery-nav-link"
                                            title="discovery">
                                            <span class="d-flex align-items-center"><i
                                                    class="bi bi-compass fa-fw nav-bar-icon"
                                                    alt="discovery icon"></i></span>
                                        </a>
                                    </li>
                                    <!-- Create post -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="./create-post.php" id="create-post-nav-link"
                                            title="create post">
                                            <span class="d-flex align-items-center"><i
                                                    class="bi bi-plus-circle fa-fw nav-bar-icon"
                                                    alt="new post icon"></i></span>
                                        </a>
                                    </li>
                                    <!-- Notifications -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="./notification.php" id="notification-nav-link"
                                            title="notifications">
                                            <span class="d-flex align-items-center"><i
                                                    class="bi bi-bell fa-fw nav-bar-icon"
                                                    alt="notification icon"></i></span>
                                        </a>
                                    </li>
                                    <!-- Profile -->
                                    <li class="nav-item">
                                        <a class="nav-link d-sm-flex align-items-sm-center" href="./profile.php"
                                            id="profile-nav-link" title="profile">
                                            <span class="d-flex align-items-center"><i
                                                    class="bi bi-person fa-fw nav-bar-icon"
                                                    alt="profile icon"></i></span>
                                        </a>
                                    </li>
                                    <!-- Logout -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="./logout.php" title="logout">
                                            <span class="d-flex align-items-center"><i
                                                    class="bi bi-box-arrow-left fa-fw nav-bar-icon"
                                                    alt="logout icon"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <!-- Main -->
        <main class="row main" id="main">
            <?php
            if (isset($templateParams["page"])) {
                require_once($templateParams["page"]);
            }
            ?>
        </main>

        <footer class="row footer mt-auto position-absolute-bottom bg-white row mt-1">
            <!-- Copyright -->
            <div class="row mt-2">
                <hr>
                <div class="col py-1 container d-md-flex justify-content-center align-items-center text-center">
                    <div class="d-md-flex justify-content-between align-items-center text-center text-md-left"
                        id="footer-container">
                        <small class="small text-center text-muted">
                            <p>©
                                <script>document.write(new Date().getFullYear())</script> FotoSapore | All rights
                                reserved: Luca Babboni - Sara Romeo - Pablo Sebastian Vargas Grateron
                            </p>
                        </small>
                    </div>
                </div>
            </div>
        </footer>
</body>
<!-- Javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="module" src="./js/feedLoader.js"></script>
<script type="module" src="./js/navbar.js"></script>
<script type="module" src="./js/delete-post.js"></script>
<script type="module" src="./js/followBtn.js"></script>
<script type="module" src="./js/likeBtn.js"></script>

</html>