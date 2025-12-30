<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $needed = $arguments[0] ?? null;
        if ($needed && session('role') !== $needed) {
            return redirect()->back()->with('error', 'Akses ditolak.');
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}