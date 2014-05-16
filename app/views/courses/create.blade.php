@extends('layout')
@section('header')
	<title>Add New Courses</title>
@stop
@section('body') 
	<h1>Create a Course</h1>
	{{ HTML::ul($errors->all()) }}
	
	{{Form::open(array('url' => 'course', 'method' => 'post'))}}
		<div class="form-group">
			{{Form::label('Course Name')}}
			{{Form::text('course_name', Input::old('course_name'), array('class' => 'form-control'))}}
		</div>
		{{Form::submit('Submit',array('class' => 'btn btn-primary'))}}
	{{Form::close()}}
@stop