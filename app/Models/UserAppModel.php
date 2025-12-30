<?php namespace App\Models;

use CodeIgniter\Model;

class UserAppModel extends Model
{
    protected $table = 'user_app';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username','password_hash','nama','role','active','created_at','updated_at'];
    protected $useTimestamps = true; protected $createdField = 'created_at'; protected $updatedField = 'updated_at';
}