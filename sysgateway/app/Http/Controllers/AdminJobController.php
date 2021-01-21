<?php
namespace App\Http\Controllers;
use App\Models\AdminJob; 
use Illuminate\Http\Response; 
use App\Traits\ApiResponser; 
use Illuminate\Http\Request; 
use DB; 

Class AdminJobController extends Controller {

    use ApiResponser;
    private $request;

    public function __construct(Request $request){
        $this->request = $request;
    }
    /**
    * Return the list of usersjob
    * @return Illuminate\Http\Response
    */

    public function index(){
        $adminjob = AdminJob::all();
        return $this->successResponse($adminjob);
    }
    /**
    * Obtains and show one userjob
    * @return Illuminate\Http\Response
    */
    public function show($id){
        $adminjob = AdminJob::findOrFail($id);
        return $this->successResponse($adminjob);
    }

    public function add(Request $request ){
        $rules = [
            'adminID' => 'required|numeric|min:1|not_in:0',
            'jobInfo' => 'required|max:20',
        ];
        $this->validate($request,$rules);

        $adminjob =AdminJob::findOrFail($request->jobInfo);
        $admin = Admin::create($request->all());
        return $this->successResponse($admin,Response::HTTP_CREATED);
    }

    public function update(Request $request,$id){
        $rules = [
            'adminID' => 'required|numeric|min:1|not_in:0',
            'jobInfo' => 'required|max:20',
        ];
        $this->validate($request, $rules);

        $adminjob =AdminJob::findOrFail($request->jobInfo);
        $admin = Admin::findOrFail($id);$admin->fill($request->all());

        if ($admin->isClean()) {
            return $this->errorResponse('At least one value must change',Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $admin->save();return $this->successResponse($admin);
    }
}