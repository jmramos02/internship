<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>OJT Registration</title>
	{{HTML::style('assets/css/pure.min.css')}}
	{{HTML::style('assets/css/style.css')}}
</head>
<body>
	<div class="pure-g-r">
    	<div class="pure-u-1">
    		<h1 class = "header">Summer Internship General Assembly</h1>
    	</div>
    </div>
    <div class="pure-g-r">
    	<div class="pure-u-3-8">&nbsp;</div>
    	<div class="pure-u-6-24 content">
    		{{Form::open(array('url' => 'students/add', 'class' => 'pure-form'))}}
    			<fieldset>
	    			<legend>Student Information</legend>
					{{Form::text('student_number','',array('maxlength' => '11', 'placeholder'=>'Student Number', 'class' => 'student-number'))}}
					{{Form::text('first_name','',array('placeholder' => 'First Name'))}}
					{{Form::text('last_name','',array('placeholder' => 'Last Name'))}}
					{{Form::select('course_id',$courses, null)}}
					{{Form::select('section')}}
				</fieldset>
    		{{Form::close()}}
    	</div>
    	<div class="pure-u-1-3">&nbsp;</div>
    </div>
</body>
</html>