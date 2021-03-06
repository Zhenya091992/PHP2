<!doctype html>
<html lang="ru">
<head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="/PHP2/style/css/bootstrap.min.css" rel="stylesheet">

    <title>Admin panel</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/PHP2/News/AllNews">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/PHP2/Admin/Admin/AllNews?user=exit">Exit</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/PHP2/Admin/Admin/AllNews">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </div>
</nav>

<?php
if (isset($errs)) {
    foreach ($errs as $err) {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <h4><?php echo $err->getMessage(); ?></h4>
        </div>
    <?php
    }
}
?>

<div class="card">
    <form action="/PHP2/Admin/Admin/SaveNews/?id=<?php echo $news['id']; ?>" method="post">
        <div class="input-group">
            <div class="input-group">
                <span class="input-group-text">Title</span>
                <input type="text" class="form-control" aria-label="Title" name="newTitle" value="<?php echo $news['title']; ?>">
            </div>
            <div class="input-group">
                <span class="input-group-text">Short description</span>
                <textarea class="form-control" name="newShortDescription" aria-label="Short description"><?php echo $news['shortDescription']; ?></textarea>
            </div>
            <div class="input-group">
                <span class="input-group-text">News</span>
                <textarea class="form-control" aria-label="News" name="newText" style="height: 200px"><?php echo $news['text']; ?></textarea>
            </div>
            <div class="input-group">
                <select name="author_id" class="form-select" aria-label="Default select example">
                    <option selected>Select author</option>
                    <?php
                    foreach ($authors as $author) {
                        echo '<option ';
                        if ($author['id'] == $news['author_id']) {
                            echo 'selected ';
                        }
                        echo 'value="' . $author['id'] . '">' . $author['nameAuthor'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="input-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>

<!-- Вариант 1: Bootstrap в связке с Popper -->
<script src="/PHP2/style/js/bootstrap.bundle.min.js"></script>

<!-- Вариант 2: Bootstrap JS отдельно от Popper
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
-->

</body>
</html>


