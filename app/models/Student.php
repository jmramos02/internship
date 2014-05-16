<?php
class Student extends Eloquent{
	public function section()
	{
		$this->belongsTo('Section');
	}
}