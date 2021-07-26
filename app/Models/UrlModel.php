<?php

namespace App\Models;

use CodeIgniter\Model;

class UrlModel extends Model
{
    protected $table = 'url';
    protected $primaryKey = 'id';

    protected $allowedFields = ['url', 'key'];

    protected $useTimestamps = true;
}
