<?php view("partials/header", ["title" => $title]); ?>
<?php view("partials/navigation", compact('user')); ?>
<?php
$errors = \Core\Session::getErrors();
$title = \Core\Session::getFlash('title');
$content = \Core\Session::getFlash('content');
?>

<h6 class="text-center mt-4">Редактировать заметку</h6>
<a href="<?= url('dashboard') ?>" class="ml-5">назад</a>

<div class="container">
    <div class="row">
        <div class="col-md-8 mr-auto ml-auto">
            <form method="POST" action="<?= url("note/update/{$note->id}") ?>">
                <div class="form-group row">
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="pinned" name="pinned" <?= $note->pinned ? 'checked' : '' ?>>
                            <label class="form-check-label" for="pinned">
                                Закрепить заметку
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="completed" name="completed" <?= $note->completed ? 'checked' : '' ?>>
                            <label class="form-check-label" for="completed">Выполнено</label>
                        </div>
                    </div>
                </div>


                <div class="form-group ">
                    <label for="exampleFormControlInput1">Заголовок</label>
                    <input type="text" class="form-control bg-dark text-white <?= isset($errors['title']) ? "is-invalid" : "" ?>" id="exampleFormControlInput1"
                           placeholder="Введите заголовок" name="title"  value="<?= htmlspecialchars($note->title) ?>">
                    <?= isset($errors['title']) ? "<div  class='invalid-feedback'>" . $errors["title"] . "</div>" : "" ?>
                </div>

                <div class="form-group">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Выбрать папку</label>
                    <select class="custom-select mr-sm-2 bg-dark text-white custom-select custom-select-sm"
                            id="inlineFormCustomSelect" name="folder_id">
                        <?php foreach ($user->folders() as $folder): ?>
                            <?php
                            if ($folder->id === $note->folder_id) {
                                echo "<option value='{$folder->id}' selected>{$folder->title}</option>";
                            } else {
                                echo "<option value='{$folder->id}'>{$folder->title}</option>";
                            }
                            ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect2">Выбрать пользователей</label>
                    <select multiple class="form-control bg-dark text-white custom-select custom-select-sm"
                            id="exampleFormControlSelect2" name="shared[]">
                            <option value="default" selected>Выберите пользователей</option>
                        <?php foreach ($users as $user): ?>
                            <option value='<?= $user->id ?>' <?= in_array($user->id ,$note->sharedNote()) ? 'selected' : "" ?>><?= $user->email ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Описание</label>
                    <textarea class="form-control bg-dark text-white <?= isset($errors['content']) ? "is-invalid" : "" ?>" id="exampleFormControlTextarea1"
                              rows="3" name="content"><?= htmlspecialchars($note->content) ?></textarea>
                    <?= isset($errors['content']) ? "<div  class='invalid-feedback'>" . $errors["content"] . "</div>" : "" ?>
                </div>

                <button class="btn btn-success btn-sm" type="submit">Редактировать</button>
            </form>
        </div>
    </div>
</div>


<?php view("partials/footer"); ?>
