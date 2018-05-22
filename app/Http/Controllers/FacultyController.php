<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Faculty;

class FacultyController extends Controller
{
    // Method to Create
    public function create(Request $request) //$request is an instance of the class Request
    {
        if($request->has('name')) {
            $name = $request->name; //
            $faculty = new Faculty(); // creating an instance of the model Faculty and assigning to 
            $faculty->name = $name; //
            $faculty->save(); //
           $response = [
        'success' => true,
        "id" => $faculty->id
     ];
    return response()->json($response, 200);
        } 
        $response = [
            'success' => false,
            "message" =>"No faculty supplied"
         ];
        return response()->json($response, 200);
        
    }


    // Method to Get All
     public function getFaculties() //$request is an instance of the class Request
    {
        $faculties = Faculty::all();
        $response = [
            'success' => true,
            "faculties" => $faculties
         ];
        return response()->json($response, 200);
    
    }


    // Get Single Faculty
     public function getFaculty($id) //$request is an instance of the class Request
    {
       
            $faculty = Faculty::find($id); // creating an instance of the model Faculty and assigning to 
            $response = [
                'success' => true,
                "faculty" => $faculty
     ];
        return response()->json($response, 200);
        } 


     // Update Faculty 
     public function updateFaculty(Request $request) //$request is an instance of the class Request
    {
        $id = $request->id;
        $name = $request->name;
        if ($id && $name) {
            $faculty = Faculty::find($id);
            $faculty->name = $name; //
            $faculty->save();
            $response = [
            'success' => true,
            "faculties" => $faculty
            ];
            return response()->json($response, 200);
        } 
        return $response = [
            'success' => false,
            "message" =>"Id or Faculty not supplied"
         ];
        return response()->json($response, 504);
        } 

    public function deleteFaculty(Request $request){

        $id = $request->id;
        if ($id) {
            $faculty = Faculty::find($id);
            $faculty->delete();
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