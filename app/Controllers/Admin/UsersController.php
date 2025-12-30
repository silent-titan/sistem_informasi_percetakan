<?php namespace App\Controllers\Admin;

use App\Controllers\BaseResourceController;
use App\Models\UserAppModel;

class UsersController extends BaseResourceController
{
    protected $modelName = UserAppModel::class;
    protected $viewPath  = 'modules/users/';

    public function index()
    {
        $data['users'] = $this->model->paginate(10);
        $data['pager'] = $this->model->pager;
        return view($this->viewPath.'/index', $data);
    }

    public function create()
    {
        $data = $this->request->getPost();
        if (!empty($data['password'])) {
            $data['password_hash'] = password_hash($data['password'], PASSWORD_DEFAULT);
            unset($data['password']);
        }
        if (!$this->model->insert($data)) return redirect()->back()->with('error','Gagal menyimpan')->withInput();
        return redirect()->back()->with('success','User dibuat');
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        if (!empty($data['password'])) {
            $data['password_hash'] = password_hash($data['password'], PASSWORD_DEFAULT);
            unset($data['password']);
        } else {
            unset($data['password']);
        }
        if (!$this->model->update($id, $data)) return redirect()->back()->with('error','Gagal update')->withInput();
        return redirect()->back()->with('success','User diupdate');
    }

    public function dashboard() {
        return view('/modules/dashboard/admin');
    }
}