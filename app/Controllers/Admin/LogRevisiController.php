<?php namespace App\Controllers\Admin;

use App\Controllers\BaseResourceController;
use App\Models\LogRevisiModel;

class LogRevisiController extends BaseResourceController
{
    protected $modelName = LogRevisiModel::class;
    protected $viewPath  = 'modules/log_revisi/';
}