<?php namespace App\Controllers\Karyawan;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $userId = session()->get('user_id'); 
        $role   = session()->get('role');

        if ($role === 'karyawan') {
            $stats = [
                'totalTransaksi' => (new TransaksiModel())->countAllResults(),
                'transaksiHariIni' => (new TransaksiModel())
                    ->where('DATE(tanggal)', date('Y-m-d'))
                    ->countAllResults(),
            ];

            return view('dashboard/karyawan', compact('stats'));
        }

        return redirect()->to('/login');
    }
}