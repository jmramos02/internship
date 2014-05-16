<?php

class SectionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sections = Section::with('course')->paginate(10);
		return View::make('sections.index')->with('sections',$sections);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$courses = Course::lists('course_name','id');
		return View::make('sections.create')->with('courses',$courses);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'section_name' => 'required',
			'course_id' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::to('subjects/create')->withErrors($validator);
		}else{
			//passed validation, create record
			$section = new Section();
			$section->section_name = Input::get('section_name');
			$section->course_id = Input::get('course_id');
			$section->save();
			//go back to index
			Session::flash('message','Successfully created subject');
			return Redirect::to('section');
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
		$courses = Course::lists('course_name','id');
		$section = Section::find($id);
		return View::make('sections.edit')->with('section',$section)->with('courses',$courses);
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
			'section_name' => 'required',
			'course_id' => 'required'
		);
		/*Go to validator*/
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::to("section/$id/edit")->withErrors($validator)->withInput();
		}else{
			$section = Section::find($id);
			$section->section_name = Input::get('section_name');
			$section->course_id = Input::get('course_id');
			$section->save();

			Session::flash('message','Successfuly Updated');
			return Redirect::to('section');	
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
		$section = Section::find($id);
		$section->delete();

		Session::flash('message', 'Successfuly Deleted');
		return Redirect::to('section');
	}

	public function getSection(){
		$course_id = Input::get('id');
		$sections = Course::where('course_id','=',$id)->get();
		return Response::toJson($sections);
	}

}