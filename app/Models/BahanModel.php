<?php namespace App\Models;

use CodeIgniter\Model;

class BahanModel extends Model
{
    protected $table = 'bahan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama','stok','satuan','harga_beli','created_at','updated_at'];
    protected $useTimestamps = true; protected $createdField = 'created_at'; protected $updatedField = 'updated_at';
}