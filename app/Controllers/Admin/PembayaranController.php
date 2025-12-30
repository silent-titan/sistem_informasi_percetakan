<?php namespace App\Controllers\Admin;

use App\Controllers\BaseResourceController;
use App\Models\PembayaranModel;
use App\Models\TransaksiModel;

class PembayaranController extends BaseResourceController
{
    protected $modelName = PembayaranModel::class;
    protected $viewPath  = 'modules/pembayaran';

    /**
     * Daftar pembayaran
     */
    public function index()
    {
        $data['pembayaran'] = $this->model->findAll();
        return view($this->viewPath.'/index', $data);
    }

    /**
     * Form tambah pembayaran
     */
    public function new()
    {
        $transaksiModel = new TransaksiModel();
        $data['transaksi'] = $transaksiModel->findAll();

        return view($this->viewPath.'/create', $data);
    }

    /**
     * Simpan pembayaran baru
     */
    public function create()
    {
        $this->model->insert([
            'transaksi_id' => $this->request->getPost('transaksi_id'),
            'tanggal'      => $this->request->getPost('tanggal'),
            'metode'       => $this->request->getPost('metode'),
            'nominal'      => $this->request->getPost('nominal'),
            'keterangan'   => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('/admin/pembayaran')->with('success', 'Pembayaran berhasil ditambahkan');
    }

    /**
     * Form edit pembayaran
     */
    public function edit($id = null)
    {
        $data['pembayaran'] = $this->model->find($id);
        return view($this->viewPath.'/edit', $data);
    }

    /**
     * Update pembayaran
     */
    public function update($id = null)
    {
        $this->model->update($id, [
            'transaksi_id' => $this->request->getPost('transaksi_id'),
            'tanggal'      => $this->request->getPost('tanggal'),
            'metode'       => $this->request->getPost('metode'),
            'nominal'      => $this->request->getPost('nominal'),
            'keterangan'   => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('/admin/pembayaran')->with('success', 'Pembayaran berhasil diperbarui');
    }

    /**
     * Hapus pembayaran
     */
    public function delete($id = null)
    {
        $this->model->delete($id);
        return redirect()->to('/admin/pembayaran')->with('success', 'Pembayaran berhasil dihapus');
    }
}