<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Admin;
use App\Traits\ApiResponser;
use DB;
use App\Services\AdminService;

Class AdminController extends Controller {
    use ApiResponser;

    public function __construct(AdminService $adminService){
        $this->adminService = $adminService;
    }

    public function index(){
        return $this->successResponse($this->adminService->obtainCustomers());
    }

    public function add(Request $request ){
        return $this->successResponse($this3->adminService->createAdmin($request->all(),Response::HTTP_CREATED));
    }

    public function show($id){
        return $this->successResponse($this->adminService->obtainCustomer($id));
    }

    public function update(Request $request,$id){
        return $this->successResponse($this->adminService->editCustomer($request->all(),$id));
    }

    public function delete($id){
        return $this->successResponse($this->adminService->deleteCustomer($id));
    }
}