<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Student;

class StudentController extends Controller
{
    // 
/*    public function getStudentOld($id){

		$students = array();

		$student1["id"] = 1;
		$student1["name"] = "Bayo";
		array_push($students, $student1);

		$student2["id"] = 2;
		$student2["name"] = "Simbi";
		array_push($students, $student2);

		$student3["id"] = 3;
		$student3["name"] = "Cherry";
		array_push($students, $student3);
		$studentObj = [];
		foreach ($students as $student) {
			if ($student["id"] == $id) {
					$studentObj = $student;
					break;
			}
		}
	
    return response()->json($studentObj, 200);
    }
*/

    // CREATE new Student
    public function create(Request $request){

    	$first_name = $request->first_name;
    	$last_name = $request->last_name;
    	$mat_no = $request->mat_no;
    	$gender = $request->gender;
    	$level = $request->level;
    	$department_id = $request->department_id;

    	if ($first_name && $last_name && $mat_no && $gender && $level && $department_id) {
    		$department = Department::find($department_id);
    		if ($department){
    			$student = Student::firstOrNew(["mat_no"=>$mat_no]);
    			$student->first_name = $first_name;
    			$student->last_name = $last_name;
    			$student->mat_no = $mat_no;
    			$student->gender = $gender;
    			$student->level = $level;
    			$student->department_id = $department_id;
    			$student->save();
    			$response = [
			        'success' => true,
			        "department" => $student
			     ];
			 	return response()->json($response, 200);
    		}
    		$response = [
            'success' => false,
            "message" =>"No Student supplied"
         ];
        return response()->json($response, 200);
    	}

    	$response = [
            'success' => false,
            "message" =>"Please Make Sure You Supply all Data"
         ];
        return response()->json($response, 200);
    }


     // Method to Get All Student
     public function getStudents() //$request is an instance of the class Request
    {
        $students = Student::all();
        $response = [
            'success' => true,
            "students" => $students
         ];
        return response()->json($response, 200);
    
    }

    // Get Single Student
     public function getStudent($id) //$request is an instance of the class Request
    {
       
            $student = Student::find($id); // creating an instance of the model Faculty and assigning to 
            $response = [
                'success' => true,
                "department" => $student
     		];
        return response()->json($response, 200);
    } 

     // Update Student
     public function updateStudent(Request $request) //$request is an instance of the class Request
    {
        $first_name = $request->first_name;
    	$last_name = $request->last_name;
    	$mat_no = $request->mat_no;
    	$gender = $request->gender;
    	$level = $request->level;
    	$department_id = $request->department_id;

        if ($first_name && $last_name && $mat_no && $gender && $level && $department_id) {
    		$department = Department::find($department_id);
    		if ($department){
    			$student = Student::firstOrNew(["mat_no"=>$mat_no]);
    			$student->first_name = $first_name;
    			$student->last_name = $last_name;
    			$student->mat_no = $mat_no;
    			$student->gender = $gender;
    			$student->level = $level;
    			$student->department_id = $department_id;
    			$student->save();
    			$response = [
			        'success' => true,
			        "department" => $student
			     ];
			 	return response()->json($response, 200);
    		}
    		$response = [
            'success' => false,
            "message" =>"No Student supplied"
         ];
        return response()->json($response, 200);
    	}

    	$response = [
            'success' => false,
            "message" =>"Please Make Sure You Supply all Data"
         ];
        return response()->json($response, 200);
} 


    public function deleteStudent(Request $request){

        $id = $request->id;
        if ($id) {
            $student = Student::find($id);
            $student->delete();
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
