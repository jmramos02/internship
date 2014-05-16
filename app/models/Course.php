<?php
class Course extends Eloquent{
	/*GET sections associated with the course.. SEE laravel documentation*/
	public function sections(){
		return $this->hasMany('Section');
	}
}