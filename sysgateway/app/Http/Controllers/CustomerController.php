<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Customer;
use App\Traits\ApiResponser;
use DB;
use App\Services\CustomerService;

Class CustomerController extends Controller {
    use ApiResponser;

    public function __construct(CustomerService $customerService){
        $this->customerService = $customerService;
    }

    public function index(){
        return $this->successResponse($this->customerService->obtainCustomers());
    }

    public function add(Request $request ){
        return $this->successResponse($this3->customerService->createAdmin($request->all(),Response::HTTP_CREATED));
    }

    public function show($id){
        return $this->successResponse($this->customerService->obtainCustomer($id));
    }

    public function update(Request $request,$id){
        return $this->successResponse($this->customerService->editCustomer($request->all(),$id));
    }

    public function delete($id){
        return $this->successResponse($this->customerService->deleteCustomer($id));
    }
}