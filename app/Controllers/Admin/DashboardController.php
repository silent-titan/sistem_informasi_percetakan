<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\BahanModel;
use App\Models\PelangganModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $stats = [
            'totalTransaksi' => (new TransaksiModel())->countAllResults(),
            'totalBahan'     => (new BahanModel())->countAllResults(),
            'totalPelanggan' => (new PelangganModel())->countAllResults(),
        ];
        return view('dashboard/admin', compact('stats'));
    }
}