<?php

namespace App\Models;

use CodeIgniter\Model;

class RestaurantModel extends Model
{
    protected $table = 'restaurants';
    protected $primaryKey = 'id';
    protected $allowsFields = ['id', 'name', 'type', 'imageurl'];
}