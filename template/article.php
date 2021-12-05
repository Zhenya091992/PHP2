<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>test</title>
</head>
    <body>
        <?php
        foreach ($news as $oneNews) {
            echo "<h2>$oneNews->title</h2><br>";
            echo $oneNews->text . '<br>';
            echo "<h4>$oneNews->author</h4>";
        }
        ?>
    </body>
</html>
