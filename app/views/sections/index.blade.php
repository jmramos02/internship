@extends('layout')
@section('header')
	<title>Sections</title>
@stop
@section('body') 
	<h1>Sections</h1>
	@if(Session::has('message'))
		<div class="alert alert-info"> {{Session::get('message')}} </div>
	@endif
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>Section Name</td>
				<td>Course</td>
				<td>Created At</td>
				<td>Updated At</td>
				<td>Edit</td>
				<td>Delete</td>
			</tr>
		</thead>
		<tbody>
			@foreach($sections as $key => $value)
				<tr>
					<td>{{$value->id}}</td>
					<td>{{$value->section_name}}</td>
					<td>{{$value->course->course_name}}</td>
					<td>{{$value->created_at}}</td>
					<td>{{$value->updated_at}}</td>
					<td>
						<a class = "btn btn-small btn-success" href="{{URL::to('section/' . $value->id . '/edit')}}">Edit</a>
					</td>
					<td>
						{{ Form::open(array('url' => 'section/' . $value->id, 'class' => 'pull-right')) }}
							{{ Form::hidden('_method', 'DELETE') }}
							{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{$sections->links()}}
	<a href="{{URL::to('section/create')}}" class = "btn btn-small btn-info"> Add New Sections </a>
@stop