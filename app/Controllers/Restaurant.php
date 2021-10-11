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

    // Get Restaurant by Id
    public function show($id = null)
    {
        $data = $this->model->getWhere(['id' => $id])->getResult();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('No Restaurant found whit id: ' . $id);
        }
    }

    //Insert new restaurant
    public function create()
    {
        $param = [
            'name' => $this->request->getVar('name'),
            'type' => $this->request->getVar('type'),
            'imageurl' => $this->request->getVar('imageurl'),
        ];
        $this->model->insert($param);
        return $this->respondCreated("Restaurant created");
    }

    //Update restaurant info
    public function update($id = null)
    {
        $param = [
            'name' => $this->request->getVar('name'),
            'type' => $this->request->getVar('type'),
            'imageurl' => $this->request->getVar('imageurl'),
        ];
        $this->model->update($id,$param);
        $response = [
            'status' => 200,
            'error' => null,
            'message' => [
                'sussess' => 'Restaurant update successfully'
            ]
            ];
            return $this->respond($response);  
    }

    //Delete restaurant
    public function delete($id = null)
    {
        $data = $this->model->find($id);
        if ($data) {
            $this->model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'message' => [
                    'sussess' => 'Restaurant deleted successfully'
                ]
                ];
                return $this->respondDeleted($response); 
        }
        else{
            return $this->failNotFound('No data found whid id:' .$id);
        }
    }




} 