<?php namespace App\Controllers\Admin;

use App\Controllers\BaseResourceController;
use App\Models\PelangganModel;

class PelangganController extends BaseResourceController
{
    protected $modelName = PelangganModel::class;
    protected $viewPath  = 'modules/pelanggan/';

    public function index()
{
    $data['pelanggan'] = $this->model->paginate(10);
    $data['pager'] = $this->model->pager;
    return view('modules/pelanggan/index', $data);
}
}