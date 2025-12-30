<?php namespace App\Controllers\Karyawan;

use App\Controllers\BaseResourceController;
use App\Models\PembayaranModel;

class PembayaranController extends BaseResourceController
{
    protected $modelName = PembayaranModel::class;
    protected $viewPath  = 'modules/pembayaran/';
}