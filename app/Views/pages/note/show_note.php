<?php view("partials/header", ["title" => $title]); ?>
<?php view("partials/navigation", compact('user')); ?>

<a href="<?= url('dashboard') ?>" class="ml-5 mt-4">назад</a>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 mr-auto ml-auto">
            <h6 class="text-center mt-4 mb-5"><?= htmlspecialchars($note->title) ?></h6>
        </div>
        <div class="col-md-10 mr-auto ml-auto">
            <p>
                <?= htmlspecialchars($note->content) ?>
            </p>
            <p class="text-right">
                <b><?= $note->getDateCreate() ?></b>
            </p>
        </div>
    </div>
</div>

<?php view("partials/footer"); ?>

