<?php namespace App\Controllers;

use App\Models\UserAppModel;

class AuthController extends BaseController
{
    public function index() { return redirect()->to('/login'); }
    public function login() { return view('auth/login'); }

    public function attempt()
    {
        $u = $this->request->getPost('username');
        $p = $this->request->getPost('password');


        $pelangganModel = new \App\Models\PelangganModel();
        $pelanggan = $pelangganModel->where('username', $u)->first();

        if ($pelanggan && password_verify($p, $pelanggan['password_hash'])) {
            session()->set([
                'isLoggedIn' => true,
                'pelanggan_id' => $pelanggan['id'],
                'username'   => $pelanggan['username'],
                'nama'       => $pelanggan['nama'],
                'role'       => 'pelanggan',
            ]);
            return redirect()->to('/pelanggan/dashboard');
        }

        $model = new UserAppModel();
        $user = $model->where('username', $u)->first();

        if ($user && password_verify($p, $user['password_hash']) && (int)$user['active'] === 1) {
            session()->set([
                'isLoggedIn' => true,
                'user_id'    => $user['id'],
                'username'   => $user['username'],
                'nama'       => $user['nama'],
                'role'       => $user['role'],
            ]);
            return redirect()->to($user['role'] === 'admin' ? '/admin/dashboard' : ($user['role'] === 'karyawan' ? '/karyawan/dashboard' : '/pelanggan/dashboard'));
        }
        return redirect()->back()->with('error', 'Login gagal.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}