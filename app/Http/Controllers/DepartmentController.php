<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Faculty;

class DepartmentController extends Controller
{
    //
    public function create(Request $request){

    	$name = $request->name;
    	$faculty_id = $request->faculty_id;

    	if ($name && $faculty_id) {
    		$faculty = Faculty::find($faculty_id);
    		if ($faculty){
    			$department = Department::firstOrNew(["name"=>$name]);
    			$department->name = $name;
    			$department->faculty_id = $faculty_id;
    			$department->save();
    			$response = [
			        'success' => true,
			        "department" => $department
			     ];
			 	return response()->json($response, 200);
    		}
    		$response = [
            'success' => false,
            "message" =>"No faculty supplied"
         ];
        return response()->json($response, 200);
    	}

    	$response = [
            'success' => false,
            "message" =>"No faculty or department supplied"
         ];
        return response()->json($response, 200);
    }

    // Method to Get All Department
     public function getDepartments() //$request is an instance of the class Request
    {
        $departments = Department::all();
        $response = [
            'success' => true,
            "departments" => $departments
         ];
        return response()->json($response, 200);
    
    }

    // Get Single Department
     public function getDepartment($id) //$request is an instance of the class Request
    {
       
            $department = Department::find($id); // creating an instance of the model Faculty and assigning to 
            $response = [
                'success' => true,
                "department" => $department
     		];
        return response()->json($response, 200);
    } 

     // Update Department 
     public function updateDepartment(Request $request) //$request is an instance of the class Request
    {
        $id = $request->id;
        $name = $request->name;
        $faculty_id = $request->faculty_id;

        if ($id && $name && $faculty_id) {

        	$faculty = Faculty::find($faculty_id);
            $department = Department::find($id);

            if($faculty && $department){
            	$department->name = $name;
            	$department->faculty_id = $faculty_id;
	            $department->save();
	            $response = [
	            'success' => true,
	            "department" => $department
	            ];
	            return response()->json($response, 200);
            }

            $response = [
	            'success' => false,
	            "message" => "No match found for faculty_id or department id"
	        ];
	        return response()->json($response, 200);
        } 
        $response = [
            'success' => false,
            "message" =>"Incomplete parameters"
         ];
        return response()->json($response, 504);
} 


    public function deleteDepartment(Request $request){

        $id = $request->id;
        if ($id) {
            $department = Department::find($id);
            $department->delete();
            $response = [
            'success' => true,
            "message" =>"Sucessfully Deleted"
            ];
            return response()->json($response, 200);
        } 
        return $response = [
            'success' => false,
            "message" =>"No Id supplied"
         ];
        return response()->json($response, 504);

     }

}
