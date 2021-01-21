<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;
class EmployeeService{
    use ConsumesExternalService;
    /**
    * The base uri to consume the User1 Service
    * @var string
    */
    public $baseUri;
    public $secret;

    public function __construct(){
        $this->baseUri =config('services.employee.base_uri');
        $this->secret =config('services.employee.secret');
    }

    public function obtainCustomers(){
        return $this->performRequest('GET','/employee'); 
    }

    public function createAdmin($data){
        return $this->performRequest('POST', '/employee',$data);
    }

    public function obtainCustomer($id){
        return $this->performRequest('GET', "/employee/{$id}");
    }

    public function editCustomer($data, $id){
        return $this->performRequest('PUT',"/employee/{$id}", $data);
    }

    public function delete($id){
        return $this->performRequest('DELETE', "/employee/{$id}");
    }
}