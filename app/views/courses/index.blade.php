@extends('layout')
@section('header')
	<title>Courses</title>
@stop
@section('body') 
	<h1>Courses</h1>
	@if(Session::has('message'))
		<div class="alert alert-info"> {{Session::get('message')}} </div>
	@endif
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>Course Name</td>
				<td>Created At</td>
				<td>Updated At</td>
				<td>Edit</td>
				<td>Delete</td>
			</tr>
		</thead>
		<tbody>
			@foreach($courses as $key => $value)
				<tr>
					<td>{{$value->id}}</td>
					<td>{{$value->course_name}}</td>
					<td>{{$value->created_at}}</td>
					<td>{{$value->updated_at}}</td>
					<td>
						<a class = "btn btn-small btn-success" href="{{URL::to('course/' . $value->id . '/edit')}}">Edit</a>
					</td>
					<td>
						{{ Form::open(array('url' => 'course/' . $value->id, 'class' => 'pull-right')) }}
							{{ Form::hidden('_method', 'DELETE') }}
							{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{$courses->links()}}
	<a href="{{URL::to('course/create')}}" class = "btn btn-small btn-info"> Add New Course </a>
@stop