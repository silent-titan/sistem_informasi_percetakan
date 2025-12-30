<?php namespace App\Controllers\Admin;
use App\Controllers\BaseResourceController;
use App\Models\DetailPembelianModel;
use App\Models\PembelianModel;
use App\Models\BahanModel;

class DetailPembelianController extends BaseResourceController
{
    protected $modelName = DetailPembelianModel::class;
    protected $viewPath = 'modules/detail_pembelian';

    public function new()
    {
        $data['pembelian'] = (new PembelianModel())->findAll();
        $data['bahan'] = (new BahanModel())->findAll();
        return view($this->viewPath . '/create', $data);
    }

    public function create()
    {
        $qty = $this->request->getPost('qty');
        $harga = $this->request->getPost('harga');
        $subtotal = $qty * $harga;

        $this->model->insert([
            'pembelian_id' => $this->request->getPost('pembelian_id'),
            'bahan_id'     => $this->request->getPost('bahan_id'),
            'qty'          => $qty,
            'harga'        => $harga,
            'subtotal'     => $subtotal,
        ]);

        return redirect()->to('/admin/detail_pembelian')->with('success', 'Detail pembelian berhasil ditambahkan');
    }
}