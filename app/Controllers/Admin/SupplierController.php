<?php namespace App\Controllers\Admin;

use App\Controllers\BaseResourceController;
use App\Models\SupplierModel;

class SupplierController extends BaseResourceController
{
    protected $modelName = SupplierModel::class;
    protected $viewPath  = 'modules/supplier';

    /**
     * Hapus data supplier
     */
    public function delete($id = null)
    {
        if (!$this->model->delete($id)) {
            return redirect()->back()->with('error', 'Gagal hapus data supplier');
        }

        return redirect()->to('/admin/supplier')->with('success', 'Data supplier berhasil dihapus');
    }
    public function new()
    {
    return view($this->viewPath.'/create');
    }
}