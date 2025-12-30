<?php namespace App\Controllers\Karyawan;

use App\Controllers\BaseController;
use App\Models\PelangganModel;

class KaryawanPelangganController extends BaseController
{
    public function index()
    {
        $model = new PelangganModel();
        $data['pelanggan'] = $model->paginate(10);
        $data['pager'] = $model->pager;
        return view('modules/pelanggan/index', $data);
    }
}