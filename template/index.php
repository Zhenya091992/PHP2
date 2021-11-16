<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>test</title>
</head>
    <body>
        <?php foreach ($news as $oneNews):
            ?><a href="article.php?id=<?php echo $oneNews->id; ?>"><h2><?php echo $oneNews->title; ?></h2></a><br>
            <?php echo $oneNews->shortDescription . '<br>';?>
        <h4><?php echo $oneNews->author;?></h4>
        <?php endforeach; ?>
    </body>
</html>

