<?php view("partials/header", ["title" => $title, 'additionalStyles' => true]); ?>
<?php
$errors = errors();
$email = \Core\Session::getFlash("email");
?>
<form class="form-signin" method="POST" action="<?= url("auth/signup") ?>">
    <h1 class="h3 mb-3 font-weight-normal text-center text-white">Регистрация</h1>

    <div class="form-group">
        <input type="email" class="form-control <?= isset($errors['email']) ? "is-invalid" : "" ?>"
               placeholder="Введите email" name="email" value="<?= $email ?>" required autofocus>
        <?= isset($errors['email']) ? "<div  class='invalid-feedback'>" . $errors["email"] . "</div>" : "" ?>
    </div>
    <div class="form-group">
        <input type="password" class="form-control <?= isset($errors['password']) ? "is-invalid" : "" ?>"
               name="password"
               placeholder="Пароль" required>
        <?= isset($errors['password']) ? "<div  class='invalid-feedback'>" . $errors["password"] . "</div>" : "" ?>
    </div>

    <div class="form-group">
        <input type="password" class="form-control <?= isset($errors['confirm_password']) ? "is-invalid" : "" ?>"
               name="confirm_password" placeholder="Повторите пароль" required>
        <?= isset($errors['confirm_password']) ? "<div  class='invalid-feedback'>" . $errors["confirm_password"] . "</div>" : "" ?>
    </div>

    <button class="btn btn-md text-white violet-color btn-block" type="submit">Зарегистрироваться
    </button>
    <p class="text-center pt-2"><a href="<?= url("login") ?>">Войти</a></p>
    <p class="mt-5 mb-3 text-muted text-center">&copy; <?= date("Y") ?></p>
</form>
<?php view("partials/footer"); ?>
