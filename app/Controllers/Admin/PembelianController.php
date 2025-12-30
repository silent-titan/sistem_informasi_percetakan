<?php namespace App\Controllers\Admin;

use App\Controllers\BaseResourceController;
use App\Models\PembelianModel;
use App\Models\SupplierModel;

class PembelianController extends BaseResourceController
{
    protected $modelName = PembelianModel::class;
    protected $viewPath  = 'modules/pembelian';

    /**
     * Daftar pembelian
     */
    public function index()
    {
        $data['items'] = $this->model->paginate(10);
        $data['pager'] = $this->model->pager;
        return view($this->viewPath.'/index', $data);
    }

    /**
     * Form tambah pembelian
     */
    public function new()
    {
        $supplierModel = new SupplierModel();
        $data['suppliers'] = $supplierModel->findAll();

        return view($this->viewPath.'/create', $data);
    }

    /**
     * Simpan pembelian baru
     */
    public function create()
    {
        $this->model->insert([
            'kode'       => $this->request->getPost('kode'),
            'supplier_id'=> $this->request->getPost('supplier_id'),
            'tanggal'    => $this->request->getPost('tanggal'),
            'total'      => $this->request->getPost('total'),
            'catatan'    => $this->request->getPost('catatan'),
        ]);

        return redirect()->to('/admin/pembelian')->with('success', 'Pembelian berhasil ditambahkan');
    }

    /**
     * Form edit pembelian
     */
    public function edit($id = null)
    {
        $data['pembelian'] = $this->model->find($id);
        return view($this->viewPath.'/edit', $data);
    }

    /**
     * Update pembelian
     */
    public function update($id = null)
    {
        $this->model->update($id, [
            'kode'       => $this->request->getPost('kode'),
            'supplier_id'=> $this->request->getPost('supplier_id'),
            'tanggal'    => $this->request->getPost('tanggal'),
            'total'      => $this->request->getPost('total'),
            'catatan'    => $this->request->getPost('catatan'),
        ]);

        return redirect()->to('/admin/pembelian')->with('success', 'Pembelian berhasil diperbarui');
    }

    /**
     * Hapus pembelian
     */
    public function delete($id = null)
    {
        $this->model->delete($id);
        return redirect()->to('/admin/pembelian')->with('success', 'Pembelian berhasil dihapus');
    }
}