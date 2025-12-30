<?php namespace App\Models;

use CodeIgniter\Model;

class LogRevisiModel extends Model
{
    protected $table = 'log_revisi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['transaksi_id','user_id','catatan','created_at'];
}