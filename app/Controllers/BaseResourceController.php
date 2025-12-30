<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

abstract class BaseResourceController extends ResourceController
{
    protected $modelName;
    protected $format   = 'html';
    protected $viewPath = ''; // ex: modules/bahan/

    public function index()
    {
        $perPage = 10;
        $data = ['items' => $this->model->paginate($perPage), 'pager' => $this->model->pager];
        return view($this->viewPath . '/index', $data);
    }

    public function new() { return view($this->viewPath . 'create'); }

    public function create()
    {
        $payload = $this->request->getPost();
        if (!$this->model->insert($payload)) return redirect()->back()->with('error', 'Gagal menyimpan')->withInput();
        return redirect()->to(current_url())->with('success', 'Berhasil dibuat');
    }

    public function edit($id = null)
    {
        $item = $this->model->find($id);
        if (!$item) return redirect()->back()->with('error', 'Data tidak ditemukan');
        return view($this->viewPath . 'edit', compact('item'));
    }

    public function update($id = null)
    {
        $payload = $this->request->getPost();
        if (!$this->model->update($id, $payload)) return redirect()->back()->with('error', 'Gagal update')->withInput();
        return redirect()->back()->with('success', 'Berhasil diupdate');
    }

    public function delete($id = null)
    {
        if (!$this->model->delete($id)) return redirect()->back()->with('error', 'Gagal hapus');
        return redirect()->back()->with('success', 'Berhasil dihapus');
    }
}