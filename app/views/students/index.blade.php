@extends('layout')
@section('header')
	<title>students</title>
@stop
@section('body') 
	<h1>Students</h1>
	@if(Session::has('message'))
		<div class="alert alert-info"> {{Session::get('message')}} </div>
	@endif
	{{Form::open(array('url' => 'student/show','method' => 'GET'))}}
		{{Form::label('')}}
		{{Form::text('')}}
	{{Form::close()}}
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>Student Number</td>
				<td>First Name</td>
				<td>Last Name</td>
				<td>Section</td>
				<td>Edit</td>
				<td>Delete</td>
			</tr>
		</thead>
		<tbody>
			@foreach($students as $key => $value)
				<tr>
					<td>{{$value->id}}</td>
					<td>{{$value->students_number}}</td>
					<td>{{$value->first_name}}</td>
					<td>{{$value->last_name}}</td>
					<td>{{$value->section->section_name}}</td>
					<td>
						<a class = "btn btn-small btn-success" href="{{URL::to('student/' . $value->id . '/edit')}}">Edit</a>
					</td>
					<td>
						{{ Form::open(array('url' => 'student/' . $value->id, 'class' => 'pull-right')) }}
							{{ Form::hidden('_method', 'DELETE') }}
							{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{$students->links()}}
@stop