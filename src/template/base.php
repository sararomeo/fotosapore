<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/style.css" />

    <!-- default title bar icon -->
    <link href="res/favicon.png" rel="shortcut icon" type="image/x-icon" />
    <title><?php echo $templateParams["titolo"]; ?></title>
</head>

<body>
    <?php
    if(isset($templateParams["login"])){
        require($templateParams["login"]);
    }
    ?>
</body>
</html>
