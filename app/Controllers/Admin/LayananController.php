<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LayananModel;

class LayananController extends BaseController
{
    public function index()
    {
        $model = new \App\Models\LayananModel();
        $layanan = $model->findAll();

        return view('modules/layanan/index', ['layanan' => $layanan]);
    }

    public function create()
    {
        return view('modules/layanan/create');
    }

    public function store()
    {
        $model = new LayananModel();
        $model->save([
            'id'         => $this->request->getPost('id'),
            'nama'       => $this->request->getPost('nama'),
            'harga'      => $this->request->getPost('harga'),
            'deskripsi'  => $this->request->getPost('deskripsi'),
            'satuan'       => $this->request->getPost('satuan'),
        ]);

        return redirect()->to('/admin/layanan');
    }

    public function edit($id)
    {
        $model = new LayananModel();
        $layanan = $model->find($id);

        return view('modules/layanan/edit', ['layanan' => $layanan]);
    }

    public function update($id)
    {
        $model = new LayananModel();
        $model->update($id, [
            'id'         => $this->request->getPost('id'),
            'nama'       => $this->request->getPost('nama'),
            'harga'      => $this->request->getPost('harga'),
            'deskripsi'  => $this->request->getPost('deskripsi'),
            'satuan'     => $this->request->getPost('satuan'),
        ]);

        return redirect()->to('/admin/layanan');
    }

    public function delete($id)
    {
        $model = new LayananModel();
        $model->delete($id);

        return redirect()->to('/admin/layanan');
    }
}