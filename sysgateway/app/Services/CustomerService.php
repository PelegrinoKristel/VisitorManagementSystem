<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;
class CustomerService{
    use ConsumesExternalService;
    /**
    * The base uri to consume the User1 Service
    * @var string
    */
    public $baseUri;
    public $secret;

    public function __construct(){
        $this->baseUri =config('services.customer.base_uri');
        $this->secret =config('services.customer.secret');
    }

    public function obtainCustomers(){
        return $this->performRequest('GET','/customer'); 
    }

    public function createAdmin($data){
        return $this->performRequest('POST', '/customer',$data);
    }

    public function obtainCustomer($id){
        return $this->performRequest('GET', "/customer/{$id}");
    }

    public function editCustomer($data, $id){
        return $this->performRequest('PUT',"/customer/{$id}", $data);
    }

    public function delete($id){
        return $this->performRequest('DELETE', "/customer/{$id}");
    }
}