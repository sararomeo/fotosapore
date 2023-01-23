<!DOCTYPE html>
<html lang="it">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap, icon, font-awesome, jsBootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <!-- Default title bar with icon -->
    <link rel="shortcut icon" href="res/favicon.ico" type="image/x-icon" />
    <title><?php echo $templateParams["title"]; ?></title>
</head>

<body>
    <!-- Header -->
    <div class="d-flex flex-column vh-100">
	<header>
    <!-- Navigation bar -->
    <div class="container row">
    <nav class="col-12 py-2 navbar navbar-expand-lg navbar-default fixed-top navbar-static-top bg-white navbar-sticky" id="navbar-container">
    <div class="container-fluid overflow-hidden">
        <!-- Left elements -->
        <div class="d-flex my-2 my-sm-0">
            <!-- Logo that leads to home page -->
            <a class="navbar-brand ms-2 me-2 d-flex align-items-center" href="./home.php"><img src="res/big-favicon.png" height="40em" alt="logo fotosapore" loading="lazy"/></a>
            <!-- Search form -->
            <div class="position-relative search-container">
                <form action="" class="search-box" method="post">
                    <input type="search" role="search" class="input search-input" name="" value="" autocomplete="off" placeholder = "Search for a recipe...">
                    <button type="button" class="btn search-btn" name="button" id="search-btn"></button>
                </form>
            </div>
        </div>

        <!-- toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="bi bi-list"></i></span>
        </button>

        <!-- Right elements to collapse -->
        <div class="collapse navbar-collapse" id="navbarScroll">
        <!-- Home -->
        <div class="float-end">
        <ul class="navbar-nav flex-row navbar-nav-scroll list-inline" id="nav-list">
            <li class="nav-item">
                <a class="nav-link" href="./home.php" id="home-nav-link">
                <span class="d-flex align-items-center"><i class="bi bi-house fa-fw nav-bar-icon"></i></span>
                <!-- pallino rosso di notifica se ci sono nuovi post nel feed della home -->
                <!-- <span class="badge rounded-pill badge-notification bg-danger"></span> -->
                </a>
            </li>
            <!-- Discovery -->
            <li class="nav-item">
                <a class="nav-link" href="./discovery.php" id="discovery-nav-link">
                <span class="d-flex align-items-center"><i class="bi bi-compass fa-fw nav-bar-icon"></i></span>
                </a>
            </li>
            <!-- Create post -->
            <li class="nav-item">
                <a class="nav-link" href="./create-post.php" id="create-post-nav-link">
                <span class="d-flex align-items-center"><i class="bi bi-plus-circle fa-fw nav-bar-icon"></i></span>
                </a>
            </li>
            <!-- Notifications -->
            <li class="nav-item">
                <a class="nav-link" href="./notification.php" id="notification-nav-link">
                <span class="d-flex align-items-center"><i class="bi bi-bell fa-fw nav-bar-icon"></i></span>
                <!-- pallino rosso notifica -->
                <!-- <span class="badge rounded-pill badge-notification bg-danger">2</span> -->
                </a>
            </li>
            <!-- Profile -->
            <li class="nav-item">
                <a class="nav-link d-sm-flex align-items-sm-center" href="./profile.php" id="profile-nav-link">
                    <!-- img profilo -->
                <!-- <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" class="rounded-circle" height="22" alt="" loading="lazy" /> -->
                <span class="d-flex align-items-center"><i class="bi bi-person fa-fw nav-bar-icon"></i></span>
                    <!-- username utente -->
                <!-- <strong class="d-none d-sm-block ms-1">John</strong> -->
                </a>
            </li>
            <!-- Logout -->
            <li class="nav-item">
                <a class="nav-link" href="./logout.php">
                <span class="d-flex align-items-center"><i class="bi bi-box-arrow-left fa-fw nav-bar-icon"></i></span>
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
    <main class = "row main" id="main">

    <!-- Home -->
	<?php require($templateParams["page"]); ?>

    </main>

    <!-- Footer -->
    <footer class="row footer mt-auto position-absolute-bottom bg-white row mt-1">        
		<div class="row">
            <hr>
			<!-- Copyright -->
            <div class="col py-1 container d-md-flex justify-content-center align-items-center text-center">
                <div class="d-md-flex justify-content-between align-items-center text-center text-md-left">
                    <small class = "small text-center text-muted">
                        <p>©<script>document.write(new Date().getFullYear())</script> FotoSapore | All rights reserved: Luca Babboni - Sara Romeo - Pablo Sebastian Vargas Grateron</p>
                    </small>
                </div>
            </div>
        </div>
    </footer>
    </div>
</body>
<!-- Javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="./js/navbar.js"></script>
</html>
