<?php namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use App\Models\PelangganModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('pelanggan/login');
    }

    public function attempt()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $pelangganModel = new PelangganModel();
        $pelanggan = $pelangganModel->where('username', $username)->first();

        if ($pelanggan && password_verify($password, $pelanggan['password_hash'])) {
            session()->set([
                'isLoggedIn'   => true,
                'pelanggan_id' => $pelanggan['id'],   // id dari tabel pelanggan
                'username'     => $pelanggan['username'],
                'nama'         => $pelanggan['nama'],
                'role'         => 'pelanggan'
            ]);
            return redirect()->to('/pelanggan/dashboard');
        }

        return redirect()->back()->with('error', 'Login gagal.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}