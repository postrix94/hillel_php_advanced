<?php view("partials/header", compact('title')); ?>
<?php view("partials/navigation", compact('user')); ?>
<div class="container-fluid">
    <?php view("partials/menu_folders", compact('user', 'activeFolder')); ?>
</div>
<?php view("partials/footer"); ?>
