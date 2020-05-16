<!DOCTYPE html>
<html>
    <head>
        <meta charset "utf-8" />
        <title>E Learning | Details Du Cours</title>
        <link rel="stylesheet" href="css/style.css" />
        <script src="https://kit.fontawesome.com/f481d2cc97.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <?php
            include ("inc/header.php");
        ?>
        <div id="wrap">
            <?php
                echo cours_details();
                include ("inc/footer.php");
            ?>
        </div>
    </body>
</html>