<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/sms', function () {
	$response = ["school"=>"My School", "State"=>"Lagos", "LGA"=>"Yaba"];
    return response()->json($response, 200);
});

Route::get('/display', function (Request $request) {
	$state = "Yaba";
	$id = 22;
	if ($request->has("state")) {
		$state = $request->state;
	}
	if ($request->has("id")) {
		$id = $request->id;
	}
	$response = ["state"=>$state, "id"=>$id];
    return response()->json($response, 200);
});

Route::get('/students', function () {
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

	// $response = [
	// 	"Success" => "True"
	// 	"Data" => "students"

	// ];
});




// To get a Single Sudent
// Route::get('/students/{id}', 'Student@getStudentOld');


// FACULTIES
// To Add a Faculty
Route::post('/faculties', 'FacultyController@create');

// Get All Faculties
Route::get('/faculties', 'FacultyController@getFaculties');

// Get a Single Faculty
Route::get('/faculties/{id}', 'FacultyController@getFaculty');

// Update Single Faculty
Route::put('/faculties', 'FacultyController@updateFaculty');

// Delete Single Faculty
Route::delete('faculties', 'FacultyController@deleteFaculty');



// DEPARTMENT
// To Add a Department
Route::post('/departments', 'DepartmentController@create');

// Get All Departments
Route::get('/departments', 'DepartmentController@getDepartments');

// Get a Single Department
Route::get('/departments/{id}', 'DepartmentController@getDepartment');

// Update Single Department
Route::put('/departments', 'DepartmentController@updateDepartment');

// Delete Single Department
Route::delete('departments', 'DepartmentController@deleteDepartment');




//STUDENT
Route::post('/students', 'StudentController@create');

// Get All Students
Route::get('/students', 'StudentController@getStudents');

// Get a Single Student
Route::get('/students/{id}', 'StudentController@getStudent');

// Update Single Student
Route::put('/students', 'StudentController@updateStudent');

// Delete Single Student
Route::delete('students', 'StudentController@deleteStudent');
