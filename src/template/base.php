<!DOCTYPE html>
<html lang="it">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <style><?php include './css/style.css'; ?></style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- non so perché non funziona con html
        <link rel="stylesheet" type="text/css" href="css/style-login.css" /> -->

    

    <!-- Default title bar icon -->
    <link rel="shortcut icon" href="res/favicon.ico" type="image/x-icon" />
    <title><?php echo $templateParams["title"]; ?></title>
</head>

<body class = "base-body">
    <!-- Header -->
	<header>
    <!-- Navigation bar -->
    <div class="container row">
    <nav class="col-12 py-2 navbar navbar-default fixed-top navbar-static-top bg-white navbar-sticky">
    <div class="container-fluid overflow-hidden">
        <!-- Left elements -->
        <div class="d-flex my-2 my-sm-0">
        <!-- Logo that leads to home page -->
        <a class="navbar-brand ms-2 me-2 mb-1 d-flex align-items-center" href="./home.php"><img src="res/big-favicon.png" height="30em" alt="logo fotosapore" loading="lazy"/></a>
        <!-- Search form -->
        <form class="input-group w-auto my-auto d-none d-sm-flex">
            <input type="search" autocomplete="off" class="form-control rounded" placeholder=" Search for a recipe... " />
            <button type="submit" class="btn"><i class="bi bi-search"></i></button>
        </form>
        </div>

        <!-- Right elements -->

        <div class="dflex my-2 my-sm-0">


            <!-- Home -->
            <ul class="navbar-nav flex-row">
                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="./home.php">
                        <span><i class="bi bi-house"></i></span>
                        <!-- pallino rosso di notifica se ci sono nuovi post nel feed della home -->
                        <!-- <span class="badge rounded-pill badge-notification bg-danger"></span> -->
                    </a>
                </li>
                <!-- Discovery -->
                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="./home.php">
                        <span><i class="bi bi-compass"></i></span>
                    </a>
        </li>
        <!-- Create post -->
        <li class="nav-item me-3 me-lg-1">
            <a class="nav-link" href="./home.php">
                <span><i class="bi bi-plus-circle"></i></span>
            </a>
        </li>
        <!-- Notifications -->
        <li class="nav-item me-3 me-lg-1">
            <a class="nav-link" href="./home.php">
                <span><i class="bi bi-bell"></i></span>
                <!-- pallino rosso notifica -->
                <!-- <span class="badge rounded-pill badge-notification bg-danger">2</span> -->
            </a>
        </li>
        <!-- Profile -->
        <li class="nav-item me-3 me-lg-1">
            <a class="nav-link d-sm-flex align-items-sm-center" href="./home.php">
                <!-- img profilo -->
                <!-- <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" class="rounded-circle" height="22" alt="" loading="lazy" /> -->
                <span><i class="bi bi-person"></i></span>
                <!-- username utente -->
                <!-- <strong class="d-none d-sm-block ms-1">John</strong> -->
            </a>
        </li>
        
    </ul>
    
    
</div>
    
    </div>
    </nav>
    </div>
    </header>

    <!-- Main -->
    <main id="#main">

    <!-- Log out -->
    
    <div class = "container row">
        
        <div class = "col-md">
            <form class="input-group" action=<?php closeSession()?>>
                <button class="btn" type="submit">
                    <i class="bi b-box-arrow-left"></i>
                </button>
            </form>
        </div>

        <div class = "col-md">
            <p>RIGA 1 di TEST</p>
            <p>RIGA 2 di TEST</p>
            <p>RIGA 3 di TEST</p>
            <p>RIGA 4 di TEST</p>
        </div>
        <div class = "col-md">
            <p>RIGA 1 di TEST</p>
            <p>RIGA 2 di TEST</p>
            <p>RIGA 3 di TEST</p>
            <p>RIGA 4 di TEST</p>
        </div>
        <div class = "col-md">
            <p>RIGA 1 di TEST</p>
            <p>RIGA 2 di TEST</p>
            <p>RIGA 3 di TEST</p>
            <p>RIGA 4 di TEST</p>
        </div>
    </div>
    </main>
</body>

</html>
