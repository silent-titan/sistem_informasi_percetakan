<?php namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use Config\Database;

class DashboardController extends BaseController
{
    public function index()
    {
        $pelangganId = session()->get('pelanggan_id');

        $db = Database::connect();
        $builder = $db->table('transaksi');
        $builder->select('transaksi.kode, transaksi.tanggal, transaksi.total, transaksi.status, layanan.nama as layanan_nama');
        $builder->join('layanan', 'transaksi.layanan_id = layanan.id');
        $builder->where('transaksi.pelanggan_id', $pelangganId);
        $builder->orderBy('transaksi.tanggal', 'DESC');
        $riwayat = $builder->get()->getResultArray();

        $layananList = $db->table('layanan')->get()->getResultArray();

        return view('dashboard/pelanggan', [
            'riwayat'     => $riwayat,
            'layananList' => $layananList
        ]);
    }

    public function beli()
    {
        $pelangganId = session()->get('pelanggan_id');
        $db = Database::connect();

        $layananId = $this->request->getPost('layanan_id');
        $jumlah    = (int) $this->request->getPost('jumlah');
        $layanan   = $db->table('layanan')->where('id', $layananId)->get()->getRowArray();

        $total = $jumlah * $layanan['harga'];

        $data = [
            'kode'         => uniqid('TRX-'),
            'pelanggan_id' => $pelangganId,
            'layanan_id'   => $layananId,
            'tanggal'      => date('Y-m-d H:i:s'),
            'status'       => 'draft',
            'total'        => $total,
            'catatan'      => $this->request->getPost('catatan')
        ];

        $db->table('transaksi')->insert($data);

        return redirect()->to('dashboard/pelanggan')->with('success', 'Pesanan berhasil dibuat');
    }
}