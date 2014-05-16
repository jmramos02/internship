<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	{{HTML::style('assets/css/bootstrap.min.css')}}
	@yield('header')
</head>
<body>
	<div class="container">
	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::to('nerds') }}">Admin</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="{{ URL::to('section') }}">Students</a></li>
			<li><a href="{{ URL::to('course') }}">Courses</a></li>
			<li><a href="{{ URL::to('section') }}">Section</a></li>
			<li><a href="{{ URL::to('section') }}">Users</a></li>
		</ul>
	</nav>
	@yield('body')
	</div>
</body>
</html>