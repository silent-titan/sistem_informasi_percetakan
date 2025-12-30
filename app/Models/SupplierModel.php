<?php namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama','kontak','alamat','created_at','updated_at'];
    protected $useTimestamps = true; protected $createdField = 'created_at'; protected $updatedField = 'updated_at';
}