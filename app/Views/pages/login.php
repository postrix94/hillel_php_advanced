<?php view("partials/header", ["title" => $title, 'additionalStyles' => true]); ?>
<?php
$errors = errors();
$email = \Core\Session::getFlash('email');
?>

<form class="form-signin" action="<?= url("auth/verify") ?>" method="POST">
    <h1 class="h3 mb-3 font-weight-normal text-center text-white">Войти</h1>

    <div class="form-group">
        <input type="email" class="form-control <?= isset($errors['email']) ? "is-invalid" : "" ?>" placeholder="Введите email"
               value="<?= $email ?>" name="email" required autofocus>
        <?= isset($errors['email']) ? "<div  class='invalid-feedback'>" . $errors["email"] . "</div>" : "" ?>
    </div>

    <div class="form-group">
        <input type="password" class="form-control <?= isset($errors['password']) ? "is-invalid" : "" ?>" name="password" placeholder="Пароль" required>
        <?= isset($errors['password']) ? "<div  class='invalid-feedback'>" . $errors["password"] . "</div>" : "" ?>
    </div>

    <button class="btn btn-md btn-primary btn-block" type="submit">Войти</button>
    <p class="text-center pt-2"><a href="<?= url("registration") ?>">Регистрация</a></p>
    <p class="mt-5 mb-3 text-muted text-center">&copy; <?= date("Y") ?></p>
</form>

<?php view("partials/footer"); ?>

