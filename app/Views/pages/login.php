<?php view("partials/header", ["title" => $title]); ?>

<form class="form-signin">
    <h1 class="h3 mb-3 font-weight-normal text-center">Войти</h1>

    <input type="email" class="form-control" placeholder="Введите email" name="email" required autofocus>
    <input type="password" class="form-control" name="password" placeholder="Пароль" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
    <p class="text-center pt-2"><a href="<?= url("registration") ?>">Регистрация</a></p>
    <p class="mt-5 mb-3 text-muted text-center">&copy; <?= date("Y") ?></p>
</form>

<?php view("partials/footer"); ?>

