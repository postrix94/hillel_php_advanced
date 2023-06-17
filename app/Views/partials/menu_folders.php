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
