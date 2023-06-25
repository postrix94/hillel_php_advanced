<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="<?= url("assets/js/bootstrap/bootstrap.min.js") ?>"></script>
<script>
    $(document).ready(function () {
        $('#createFolder').tooltip()
        $('#createNote').tooltip()

        const formCreateFolder = document.getElementById("newFolderForm");
        const btnDeleteFolder = document.getElementById('deleteFolder');
        const formEditFolder = document.getElementById("editFolderForm");

        //Удалить папку
        if (btnDeleteFolder) {
            btnDeleteFolder.addEventListener('click', function (e) {
                e.preventDefault();
                let isDelete = confirm("Удалить папку?");

                if (!isDelete) return;

                btnDeleteFolder.closest('form').submit();
            });
        }

        //Редактирвоать папку

        $('#editFolder').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var recipient = button.data('whatever');
            var modal = $(this);
            modal.find('.modal-title').text(recipient);
        });
        $('#editFolder').on('hide.bs.modal', clearInput.bind(this, formEditFolder));
        $('#editFolderBtn').on('click', function (e) {
            let folder_name = formEditFolder.folder_name ? formEditFolder.folder_name.value.trim() : null;
            let url = formEditFolder.action;


            ajax(url,'POST', {folder_name}, successUpdateFolder.bind(this), errorEditFolder);
        });


        //Создать новую папку
        $('#createNewFolder').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var recipient = button.data('whatever');
            var modal = $(this);
            modal.find('.modal-title').text(recipient);
        });
        $('#createNewFolder').on('hide.bs.modal', clearInput.bind(this, formCreateFolder));

        $("#addNewFolder").on("click", function (e) {
            let folder_name = formCreateFolder.folder_name ? formCreateFolder.folder_name.value.trim() : null;
            ajax(formCreateFolder.action, "POST", {folder_name}, successCreateFolder.bind(this), errorCreateFolder);
        });


        function clearInput(formEl) {
            formEl.folder_name.value = "";
            $(formEl.folder_name).removeClass("is-invalid");
        }

        function ajax(url, method = "POST", data, success, error) {
            $.ajax({
                url,
                method,
                data,
                success,
                error
            });
        }

        function successCreateFolder(response) {
            window.location = location.origin + response.url;
            setTimeout(() => {
                clearInput(formCreateFolder)
            }, 500);
        }

        function errorCreateFolder(e) {
            $(formCreateFolder.folder_name).addClass("is-invalid");
            let message = e.responseJSON.folder_name ? e.responseJSON.folder_name : "Ошибка!";
            $("#error_create_folder").text(message);
        }

        function successUpdateFolder(response) {
            window.location = location.origin + response.url;
            setTimeout(() => {
                clearInput(formEditFolder)
            }, 500);
        }

        function errorEditFolder(e) {
            $(formEditFolder.folder_name).addClass("is-invalid");
            let message = e.responseJSON.folder_name ? e.responseJSON.folder_name : "Ошибка!";
            $("#error_edit_folder").text(message);
        }


        $("#createNote").on("click", function (e) {
            console.log(this.href)
            window.location = this.href;
        });

        });
</script>
</body>
</html>