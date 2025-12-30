<?php namespace App\Models;

use CodeIgniter\Model;

class DetailPesananModel extends Model
{
    protected $table      = 'detail_pesanan';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'transaksi_id',
        'layanan_id',
        'bahan_id',
        'deskripsi',
        'qty',
        'harga',
        'subtotal'
    ];
}