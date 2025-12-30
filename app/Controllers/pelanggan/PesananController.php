<?php namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;

class PesananController extends BaseController
{
    public function index()
    {
        $pelangganId = session()->get('pelanggan_id');
        $model = new TransaksiModel();
        $pesanan = $model->where('pelanggan_id', $pelangganId)->findAll();

        return view('pelanggan/pesanan/index', ['pesanan' => $pesanan]);
    }
}