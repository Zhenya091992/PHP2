<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>test</title>
</head>
    <body>
        <?php
        foreach ($news as $oneNews) {
            echo '<a href="article.php?id=' . $oneNews->id . '"><h2>' . $oneNews->title . '</h2></a><br>';
            echo $oneNews->shortDescription . '<br>';
            echo "<h4>$oneNews->author</h4>";
        }
        ?>
    </body>
</html>
