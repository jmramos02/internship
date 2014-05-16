<?php

class CourseController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$courses = Course::paginate(10);
		return View::make('courses.index')->with('courses',$courses);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('courses.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'course_name' => 'required'
		);
		/*Go to validator*/
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::to('course/create')->withErrors($validator)->withInput();
		}else{
			//passed validation, save information
			$course = new Course();
			$course->course_name = Input::get('course_name');
			$course->save();
			//Go back to index
			Session::flash('message','Successfully created course');
			return Redirect::to('course');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$course = Course::find($id);
		return View::make('courses.edit')->with('course',$course);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'course_name' => 'required'
		);
		/*Go to validator*/
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::to("course/$id/edit")->withErrors($validator)->withInput();
		}else{
			$course = Course::find($id);
			$course->course_name = Input::get('course_name');
			$course->save();

			//session flash
			Session::flash('message', 'Successfuly Updated');
			return Redirect::to('course');
		}		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$course = Course::find($id);
		$course->delete();

		//redirect
		Session::flash('message','Successfuly Deleted');
		return Redirect::to('course');
	}

}