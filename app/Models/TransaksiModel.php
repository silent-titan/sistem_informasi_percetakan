<?php namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $allowedFields = [
    'kode',
    'pelanggan_id',
    'karyawan_id',
    'tanggal',
    'status',
    'total',
    'catatan'
];
    protected $useTimestamps = true; protected $createdField = 'created_at'; protected $updatedField = 'updated_at';
}