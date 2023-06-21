<h6 class="text-center mt-4 mb-3">Папки</h6>
<ul class="nav nav-pills">
    <?php foreach ($folders as $folder):
        $active = (isset($activeFolder) && $activeFolder === $folder->id) ? "folder_open" : "folder";
        $activeColor = $active === "folder_open" ? 'active-folder' : '';
        $linkFolder = url("folder/{$folder->id}");
        echo "<li class='nav-item'>
        <a class='nav-link {$activeColor} d-flex font-weight-normal' href='{$linkFolder}'>
            {$folder->title}
            <span class='material-symbols-outlined'>{$active}</span>
        </a>
    </li>";

    endforeach; ?>
</ul>

<?php if (isset($activeFolder) && $activeFolder !== 1): ?>
    <div class="d-flex justify-content-end">
        <div>
            <button type="button" class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#editFolder" data-whatever="Редактировать папку">
                Редактировать папку
            </button>

        </div>

        <form method="POST" class="ml-5" action="<?= url("folder/delete/{$activeFolder}") ?>">
            <button id="deleteFolder" type='submit' class='btn btn-sm btn-outline-danger'>Удалить папку</button>
        </form>
    </div>
<?php endif; ?>

<div class="modal fade" id="editFolder" tabindex="-1" role="dialog"
     aria-labelledby="Редактировать папку" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editFolderForm" action="<?= url("folder/update/{$activeFolder}") ?>" method="POST">
                    <div class="form-group text-black">
                        <label for="recipient-name" class="col-form-label">Название папки:</label>
                        <input type="text" class="form-control" id="recipient-name" name="folder_name">
                        <div id="error_edit_folder" class='invalid-feedback'></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button type="submit" id="editFolderBtn" class="btn btn-success">Редактировать</button>
            </div>
        </div>
    </div>
</div>

