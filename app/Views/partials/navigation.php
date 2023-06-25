
<nav class="navbar navbar-dark bg-dark">
    <div class="d-flex align-items-center">
        <a class="navbar-brand" href="<?= url("dashboard") ?>">
            <img src="<?= url('assets/images/logo.svg') ?>" width="30" height="30" class="d-inline-block align-top" alt="">
        </a>
        <span class="text-warning"><?= $user->email ?></span>
    </div>


    <ul class="nav">
        <li class="nav-item">
            <a id="createFolder" class="d-flex"
               data-placement="top" title="Создать папку"  data-toggle="modal"
               data-target="#createNewFolder" data-whatever="Cоздать папку">
                <span class="material-symbols-outlined">create_new_folder</span>
            </a>
        </li>

        <li class="nav-item">
            <a id="createNote" href="<?= url("note/create") ?>" class="d-flex"
               data-placement="top" title="Создать заметку"  data-toggle="modal">
               <span class="material-symbols-outlined">add_notes</span>
            </a>
        </li>
    </ul>


    <form action="<?= url('logout') ?>" method="POST">
        <button class="btn btn-sm bg-danger text-white" type="submit">Выйти</button>
    </form>
</nav>

<div class="modal fade" id="createNewFolder" tabindex="-1" role="dialog"
     aria-labelledby="Создать папку" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" >New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="newFolderForm" action="<?= url('folder/create') ?>" method="POST">
                    <div class="form-group text-black">
                        <label for="recipient-name" class="col-form-label">Название папки:</label>
                        <input type="text" class="form-control" id="recipient-name" name="folder_name">
                        <div id="error_create_folder" class='invalid-feedback'></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button type="submit" id="addNewFolder" class="btn btn-success">Создать</button>
            </div>
        </div>
    </div>
</div>

