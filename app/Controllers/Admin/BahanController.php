<?php namespace App\Controllers\Admin;

use App\Controllers\BaseResourceController;
use App\Models\BahanModel;

class BahanController extends BaseResourceController
{
    protected $modelName = BahanModel::class;
    protected $viewPath  = 'modules/bahan/';

    public function delete($id = null)
    {
        if (!$this->model->delete($id)) {
            return redirect()->back()->with('error', 'Gagal hapus data bahan');
        }
        return redirect()->to('/admin/bahan')->with('success', 'Data bahan berhasil dihapus');
    }
}