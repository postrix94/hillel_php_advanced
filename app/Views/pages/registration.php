<?php view("partials/header", ["title" => $title]); ?>
<form class="form-signin" method="POST" action="<?= url("auth/signup") ?>">
    <h1 class="h3 mb-3 font-weight-normal text-center">Регистрация</h1>

    <input type="email" class="form-control" placeholder="Введите email" name="email" required autofocus>
    <input type="password" class="form-control" name="password" placeholder="Пароль" required>
    <input type="password" class="form-control" name="confirm_password" placeholder="Повторите пароль" required>

    <button class="btn btn-lg btn-primary btn-block" style="background: #6610f2;" type="submit">Зарегистрироваться</button>
    <p class="text-center pt-2"><a href="<?= url("login") ?>">Войти</a></p>
    <p class="mt-5 mb-3 text-muted text-center">&copy; <?= date("Y") ?></p>
</form>
<?php view("partials/footer"); ?>
