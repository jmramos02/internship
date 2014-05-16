@extends('layout')
@section('header')
	<title>Edit Course</title>
@stop
@section('body') 
	<h1>Create a Course</h1>
	{{ HTML::ul($errors->all()) }}
	
	{{Form::model($course, array('route' => array("course.update", $course->id), 'method'=> 'PUT'))}}
		<div class="form-group">
			{{Form::label('Course Name')}}
			{{Form::text('course_name', Input::old('course_name'), array('class' => 'form-control'))}}
		</div>
		{{Form::submit('Submit',array('class' => 'btn btn-primary'))}}
	{{Form::close()}}
@stop