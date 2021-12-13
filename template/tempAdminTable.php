<!doctype html>
<html lang="ru">
<head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="style/css/bootstrap.min.css" rel="stylesheet">

    <title>Admin panel</title>
</head>
<body>

<table class="table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">Name news</th>
        <th scope="col">Short description</th>
        <th scope="col">Author</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $value){ ?>
        <tr>
            <th scope="row"><?php echo $value->id; ?></th>
            <td><?php echo $value->title; ?></td>
            <td><?php echo $value->shortDescription; ?></td>
            <td><?php echo $value->author instanceof \App\Models\Author ? $value->author->nameAuthor : $value->author ?></td>
            <td>
                <a data-bs-toggle="modal" class="btn btn-success btn-sm" href="#exampleModal<?php echo $value->id; ?>" role="button" >update</a>
                <a class="btn btn-danger btn-sm" href="?action=delete&id=<?php echo $value->id; ?>" role="button">delete</a>
            </td>
        </tr>
    <?php
    require __DIR__ . '/modalUpdate.php';
    }
    ?>
    </tbody>
</table>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Create news
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create news</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="index.php?action=create" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="validationText" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="validationTextarea" class="form-label">Short description</label>
                        <textarea class="form-control" name="shortDescription"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="validationTextarea" class="form-label">News</label>
                        <textarea class="form-control" name="text"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="validationText" class="form-label">Author</label>
                        <input type="text" class="form-control" name="author">
                    </div>
                    <div class="mb-3">
                        <select name="author_id" class="form-select" aria-label="Default select example">
                            <option selected>Select author</option>
                            <?php
                            foreach ($authors as $author) {
                                echo '<option value="' . $author->id . '">' . $author->nameAuthor . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Дополнительный JavaScript; выберите один из двух! -->

<!-- Вариант 1: Bootstrap в связке с Popper -->
<script src="style/js/bootstrap.bundle.min.js"></script>

<!-- Вариант 2: Bootstrap JS отдельно от Popper
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
-->

</body>
</html>