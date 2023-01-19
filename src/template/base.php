<!DOCTYPE html>
<html lang="it">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <style><?php include './css/style.css'; ?></style>
    <!-- non so perché non funziona con html
        <link rel="stylesheet" type="text/css" href="css/style-login.css" /> -->

    <!-- Default title bar icon -->
    <link rel="shortcut icon" href="res/favicon.png" type="image/x-icon" />
    <title><?php echo $templateParams["title"]; ?></title>
</head>

<body>
    <?php
    if(isset($templateParams["login"])){
        require($templateParams["login"]);
    }
    
    if(isset($templateParams["signup"])){
        require($templateParams["signup"]);
    }
    ?>
</body>
</html>
