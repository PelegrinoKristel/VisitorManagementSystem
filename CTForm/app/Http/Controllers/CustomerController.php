<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Customer;
use App\Traits\ApiResponser;
use DB;

Class CustomerController extends Controller {
    use ApiResponser;

    private $request;
    public function __construct(Request $request){
        $this->request = $request;
    }

    public function getUsers(){
        $users = DB::connection('mysql')
        ->select("Select * from tblcustomers");
        return response()->json($users, 200);
    }

    public function index(){
        $users = DB::connection('tblcustomers')
        ->select("Select * from tbluser");

        return $this->successResponse($users);
    }

    public function add(Request $request){
        $rules = [
            'fullname'=>'required',
            'address'=>'required',
            'number'=>'required',
            'temperature'=>'required',
            'datevisit'=>'required',
        ];
        $this->validate($request, $rules);
        $input = Customer::create($request->all());
        return $this->successResponse($input, RESPONSE::HTTP_CREATED);
    }

    public function search($id){
        $user = Customer::where('id', $id)->first();
        if($user){
            return $this->successResponse($user);
        }
        else{
            return $this->errorResponse('User ID Does Not Exists', Response::HTTP_NOT_FOUND);
        }
    }

    public function update(Request $request, $id){
        $rules = [
            'fullname' => 'max:10',
            'address' => 'max:10',
            'number' => 'max:10',
            ];
    
        $this->validate($request, $rules);
        $user = Customer::findOrFail($id);
            
        $user->fill($request->all());

        if ($user->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user->save();
        return $this->successResponse($user);
    }

    public function delete($id){
        $users  = Customer::find($id);
        $users->delete();
   
        return response()->json('Removed successfully.');
    }  
}