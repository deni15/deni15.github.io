<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
	protected $table = "users";
    protected $primaryKey = "id";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'password', 'fullname', 'jenis_kelamin', 'email', 'id_groups','alamat','no_telp','tanggal_lahir'];
}
