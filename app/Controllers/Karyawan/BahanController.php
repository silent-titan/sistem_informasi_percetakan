<?php namespace App\Controllers\Karyawan;

use App\Controllers\BaseController;
use App\Models\BahanModel;

class BahanController extends BaseController
{
    public function index()
    {
        $m = new BahanModel();
        return view('modules/bahan/index', ['items'=>$m->paginate(10),'pager'=>$m->pager]);
    }
}