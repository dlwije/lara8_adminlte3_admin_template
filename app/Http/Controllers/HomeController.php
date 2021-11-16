<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function myCompany(){

        return view('my_company');
    }

    public function employeeList(){

        return view('employee/employee_list');
    }

    public function employeeCreate(){

        return view('employee/create');
    }

    public function employeeCreateSubmit(Request $request){

        $validateMsgs = [
            'first_name.required' => 'Your First name is required'
        ];

        $validateRequest = Validator::make($request->all(),[

            'first_name'      => ['required', 'string', 'max:255'],
        ],$validateMsgs);

        if($validateRequest->fails()){

            return response()->json([
                'status' => false,
                'message' => $validateRequest->getMessageBag()
            ], 401);
        }

        $pro_img = NULL;

        try {
            $data = [
                'emp_no' => $request->emp_no,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'full_name' => $request->first_name.' '.$request->last_name,
                'pro_imgs' => $pro_img,
            ];
            $resp = Employee::create($data);

            return response()->json([
                'status' => true,
                'message' => 'Employee created successfully'
            ], 200);

        }catch (\Exception $e){

            return response()->json([
                'status' => false,
                'message' => ['Somethings went wrong']
            ], 500);
        }




    }
}
