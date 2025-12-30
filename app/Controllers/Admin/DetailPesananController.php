<?php namespace App\Controllers\Admin;

use App\Controllers\BaseResourceController;
use App\Models\DetailPesananModel;
use App\Models\TransaksiModel;
use App\Models\LayananModel;
use App\Models\BahanModel;

class DetailPesananController extends BaseResourceController
{
    protected $modelName = DetailPesananModel::class;
    protected $viewPath  = 'modules/detail_pesanan';

    public function index()
    {
        $data['items'] = $this->model->findAll();
        return view($this->viewPath . '/index', $data);
    }

    public function new()
    {
        $transaksiModel = new TransaksiModel();
        $layananModel   = new LayananModel();
        $bahanModel     = new BahanModel();

        $data['transaksi'] = $transaksiModel->findAll();
        $data['layanan']   = $layananModel->findAll();
        $data['bahan']     = $bahanModel->findAll();

        return view($this->viewPath . '/create', $data);
    }

    public function create()
    {
        $qty   = $this->request->getPost('qty');
        $harga = $this->request->getPost('harga');
        $subtotal = $qty * $harga;

        $this->model->insert([
            'transaksi_id' => $this->request->getPost('transaksi_id'),
            'layanan_id'   => $this->request->getPost('layanan_id'),
            'bahan_id'     => $this->request->getPost('bahan_id'),
            'deskripsi'    => $this->request->getPost('deskripsi'),
            'qty'          => $qty,
            'harga'        => $harga,
            'subtotal'     => $subtotal,
        ]);

        return redirect()->to('/admin/detail_pesanan')->with('success', 'Detail pesanan berhasil ditambahkan');
    }

    public function edit($id = null)
    {
        $data['detail'] = $this->model->find($id);
        return view($this->viewPath . '/edit', $data);
    }

    public function update($id = null)
    {
        $qty   = $this->request->getPost('qty');
        $harga = $this->request->getPost('harga');
        $subtotal = $qty * $harga;

        $this->model->update($id, [
            'layanan_id' => $this->request->getPost('layanan_id'),
            'bahan_id'   => $this->request->getPost('bahan_id'),
            'deskripsi'  => $this->request->getPost('deskripsi'),
            'qty'        => $qty,
            'harga'      => $harga,
            'subtotal'   => $subtotal,
        ]);

        return redirect()->to('/admin/detail_pesanan')->with('success', 'Detail pesanan berhasil diperbarui');
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        return redirect()->to('/admin/detail_pesanan')->with('success', 'Detail pesanan berhasil dihapus');
    }
}