<?php namespace App\Controllers\Admin;

use App\Controllers\BaseResourceController;
use App\Models\TransaksiModel;
use App\Models\DetailPesananModel;
use App\Models\PelangganModel;
use App\Models\LogRevisiModel;

class TransaksiController extends BaseResourceController
{
    protected $modelName = TransaksiModel::class;
    protected $viewPath  = 'modules/transaksi/';


    public function new()
    {
        $pelangganModel = new PelangganModel();
        $data['pelanggan'] = $pelangganModel->findAll();
        return view($this->viewPath.'/create', $data);
    }
  public function edit($id = null)
    {
    $transaksi = $this->model->find($id);
    if (!$transaksi) {
        return redirect()->back()->with('error', 'Transaksi tidak ditemukan');
    }

    $pelangganModel = new PelangganModel();
    $data['pelanggan'] = $pelangganModel->findAll();

    $data['transaksi'] = $transaksi;

    return view($this->viewPath.'/edit', $data);
    }

    public function addItem($id)
    {
        $dm = new DetailPesananModel();
        $p = $this->request->getPost();
        $p['transaksi_id'] = $id;
        $p['subtotal'] = (float)$p['qty'] * (float)$p['harga'];
        if (!$dm->insert($p)) return redirect()->back()->with('error','Gagal menambah item');

        $sum = array_sum(array_column($dm->where('transaksi_id',$id)->findAll(),'subtotal'));
        $this->model->update($id, ['total'=>$sum]);

        return redirect()->back()->with('success','Item ditambahkan');
    }

    public function updateStatus($id)
    {
        $status = $this->request->getPost('status');
        if (!in_array($status,['draft','proses','selesai','batal'])) return redirect()->back()->with('error','Status tidak valid');
        $this->model->update($id, ['status'=>$status]);

        (new LogRevisiModel())->insert([
            'transaksi_id' => $id,
            'user_id' => session('user_id'),
            'catatan' => 'Update status ke: '.$status
        ]);

        return redirect()->back()->with('success','Status diperbarui');
    }
}