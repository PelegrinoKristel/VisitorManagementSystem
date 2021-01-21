<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;
class AdminService{
    use ConsumesExternalService;
    /**
    * The base uri to consume the User1 Service
    * @var string
    */
    public $baseUri;
    public $secret;

    public function __construct(){
        $this->baseUri =config('services.admin.base_uri');
        $this->secret =config('services.admin.secret');
    }

    public function obtainCustomers(){
        return $this->performRequest('GET','/admin'); 
    }

    public function createAdmin($data){
        return $this->performRequest('POST', '/admin',$data);
    }

    public function obtainCustomer($id){
        return $this->performRequest('GET', "/admin/{$id}");
    }

    public function editCustomer($data, $id){
        return $this->performRequest('PUT',"/admin/{$id}", $data);
    }

    public function delete($id){
        return $this->performRequest('DELETE', "/admin/{$id}");
    }
}