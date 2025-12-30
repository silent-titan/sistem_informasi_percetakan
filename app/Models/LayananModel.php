<?php namespace App\Models;

use CodeIgniter\Model;

class LayananModel extends Model
{
    protected $table      = 'layanan';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama', 'deskripsi', 'harga', 'satuan', 'created_at', 'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}