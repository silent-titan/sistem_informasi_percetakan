<?php

namespace App\Controllers\Karyawan;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\PelangganModel;

class TransaksiController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new TransaksiModel();
    }

    public function index()
    {
        $data['items'] = $this->model->findAll();
        return view('modules/transaksi/index', $data);
    }

    public function new()
    {
        $pelangganModel = new PelangganModel();
        $data['pelanggan'] = $pelangganModel->findAll();

        return view('modules/transaksi/create', $data);
    }

    // simpan transaksi baru
    public function create()
    {
        $this->model->insert([
            'kode'        => $this->request->getPost('kode'),
            'pelanggan_id'=> $this->request->getPost('pelanggan_id'),
            'tanggal'     => $this->request->getPost('tanggal'),
            'status'      => $this->request->getPost('status'),
            'catatan'     => $this->request->getPost('catatan'),
            'total'       => $this->request->getPost('total') ?? 0,
        ]);

        return redirect()->to('/karyawan/transaksi')->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function delete($id = null)
    {
    $this->model->delete($id);
    return redirect()->to('/karyawan/transaksi')->with('success', 'Transaksi berhasil dihapus');
    }
}