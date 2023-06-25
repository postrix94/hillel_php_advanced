<div id="notes" class="row mt-4">

    <?php
    ?>

    <?php foreach ($notes as $note): ?>

    <div class="col-sm-3">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <?php if($note->pinned) :?>
                        <span class="material-symbols-outlined" style="color: yellow">push_pin</span>
                    <?php endif; ?>
<!--                    <span class="material-symbols-outlined">group</span>-->
                    <?php if($note->completed) :?>
                        <span class="material-symbols-outlined" style="color: greenyellow">edit_attributes</span>
                    <?php endif; ?>
                </div>

                <h6 class="card-title text-center"><?= $note->title ?></h6>
                <p class="card-text"><?= $note->previewNoteText() ?></p>
                <a href="<?= url("note/show/{$note->id}") ?>" class="show-notes"><span class="material-symbols-outlined">visibility</span></a>
                <a class="delete-notes">
                    <form action="<?= url("note/delete/{$note->id}") ?>" class="d-inline" method="POST">
                        <button class="btn-delete-note">
                            <span style="color: red" class="material-symbols-outlined">delete</span>
                        </button>
                    </form>
                </a>
                <a href="<?= url("note/edit/{$note->id}") ?>"><span style="color: gold" class="material-symbols-outlined">edit</span></a>
                <h6><span class="badge badge-secondary"><?= $note->getDateCreate() ?></span></h6>
            </div>
        </div>
    </div>


    <?php endforeach; ?>

</div>