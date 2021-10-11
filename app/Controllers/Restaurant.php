<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;


class Restaurant extends ResourceController
{
    use ResponseTrait;
    protected $modelName = 'App\Models\RestaurantModel';
    protected $format = 'json';

    //get all Restaurant
    public function index(){
        $data['restaurants'] = $this->model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }
} 