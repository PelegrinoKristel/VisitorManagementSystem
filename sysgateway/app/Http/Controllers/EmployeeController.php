<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Employee;
use App\Traits\ApiResponser;
use DB;

Class EmployeeController extends Controller {
    use ApiResponser;

    private $request;
    public function __construct(Request $request){
        $this->request = $request;
    }

    public function getUsers(){
        $users = DB::connection('mysql')
        ->select("Select * from tblemployees");
        return response()->json($users, 200);
    }

    public function index(){
        $users = DB::connection('tblemployees')
        ->select("Select * from tblemployees");

        return $this->successResponse($users);
    }

    public function add(Request $request){
        $rules = [
            'fullname'=>'required',
            'address'=>'required',
            'emailadd'=>'required',
            'number'=>'required',
            'job'=>'required',
        ];
        $this->validate($request, $rules);
        $input = Employee::create($request->all());
        return $this->successResponse($input, RESPONSE::HTTP_CREATED);
    }

    public function search($id){
        $user = Employee::where('id', $id)->first();
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
            'address' => 'max:20',
            'emailadd' => 'max:20',
            ];
    
        $this->validate($request, $rules);
        $user = Employee::findOrFail($id);
            
        $user->fill($request->all());

        if ($user->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user->save();
        return $this->successResponse($user);
    }

    public function delete($id){
        $users  = Employee::find($id);
        $users->delete();
   
        return response()->json('Removed successfully.');
    }  
}