<?php
class Section extends Eloquent{
	public function course()
	{
		return $this->belongsTo('Course');
	}
}