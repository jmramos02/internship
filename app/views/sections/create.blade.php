@extends('layout')
@section('header')
	<title>Add New Section</title>
@stop
@section('body') 
	<h1>Create a Section</h1>
	{{ HTML::ul($errors->all()) }}
	
	{{Form::open(array('url' => 'section', 'method' => 'post'))}}
		<div class="form-group">
			{{Form::label('Section Name')}}
			{{Form::text('section_name', Input::old('section_name'), array('class' => 'form-control'))}}
			{{Form::label('Course Name')}}
			{{Form::select('course_id',$courses, null ,array('class' => 'form-control'))}}
		</div>
		{{Form::submit('Submit',array('class' => 'btn btn-primary'))}}
	{{Form::close()}}
@stop