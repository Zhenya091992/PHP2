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
        <a class="navbar-brand" href="/PHP2/Admin/Admin/AllNews">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </div>
</nav>
<?php
if (!empty($errs)) {
    foreach ($errs as $err) {
?>
        <div class="alert alert-danger" role="alert">
            <?php echo $err; ?>
        </div>
<?php
    }
}
?>
<div class="card" style="width: 25rem;">
    <div class="card-body">
        <form class="form-signin" action="SignIn" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Пожалуйста войдите</h1>
            <label for="inputUser" class="sr-only">User</label>
            <input type="text" name="user" id="inputUser" class="form-control" placeholder="User">
            <label for="inputPassword" class="sr-only">Пароль</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Пароль">
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Запомнить меня
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
        </form>
    </div>
</div>



    <script src="/PHP2/style/js/bootstrap.bundle.min.js"></script>
</body>
</html>
