<?php


namespace App\Controllers;
use App\Models\Folder;
use App\Models\Note;
use App\Models\User;
use App\Services\Auth\AuthService;
use App\Services\NoteService;
use App\Validators\Note\ValidatorNote;
use Core\BaseController;
use Core\Exception\ClientErrorException;
use Core\Session;

class NotesController extends BaseController
{
    public function before(string $action): bool
    {
        if (AuthService::check()) {
            return true;
        }

        redirect('login');
    }

    public function show($id) {
        $user = AuthService::user();
        $note = Note::find($id);
        if(!$note || $note->author_id !== $user->id) {
            throw new ClientErrorException(code:404);
        }

        return view('pages/note/show_note', ['title' => 'Заметка', 'user' => $user, 'note' => $note]);
    }

    public function create() {
        $user = AuthService::user();
        return view('pages/note/create_note', ['title' => 'Создать заметку', 'user' => $user, "users" => User::getOtherUsers()]);
    }


    public function store() {
        $validator = new ValidatorNote();
        $fields = $validator->checkAllowedFields(array_keys($_POST), array_values($_POST));

        if(!$validator->validate(["title" => $fields['title'], 'content' => $fields['content']])) {
            Session::addErrors($validator->getErrors());
            Session::flash('title', $fields['title']);
            Session::flash('content', $fields['content']);
            return redirectBack();
        }

        $note = new NoteService();
        $note->create($fields);

        Session::flash('alert', 'success');
        Session::flash('message', 'Заметка создана!');
        redirect("folder/{$fields['folder_id']}");
    }

    public function edit(int $id) {
        $user = AuthService::user();
        $note = Note::find($id);

        if(!$note || $note->author_id !== $user->id) {
            throw new ClientErrorException(code:404);
        }

        return view('pages/note/edit_note', ['title' => 'Редактирвать заметку', 'user' => $user,
            "users" => User::getOtherUsers(), 'note' => $note]);
    }

    public function update($id) {
        $validator = new ValidatorNote();
        $fields = $validator->checkAllowedFields(array_keys($_POST), array_values($_POST));

        if(!$validator->validate(["title" => $fields['title'], 'content' => $fields['content']])) {
            Session::addErrors($validator->getErrors());
            Session::flash('title', $fields['title']);
            Session::flash('content', $fields['content']);
            return redirectBack();
        }

        $note = new NoteService();
        $note->update($fields, $id);

        Session::flash('alert', 'success');
        Session::flash('message', 'Заметка изменена!');
        redirect("folder/{$fields['folder_id']}");
    }

    public function delete($id) {
        $note = new NoteService();

        if($note->delete($id)) {
            Session::flash('alert', 'success');
            Session::flash('message', 'Заметка удалена!');
            return redirectBack();
        }

        Session::flash('alert', 'danger');
        Session::flash('message', 'Заметка не найдена!');
        return redirect('dashboard');
    }

}