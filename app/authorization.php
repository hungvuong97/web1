<?php
	namespace App;
	use Illuminate\Database\Eloquent\Model;
	/**
	  * 
	  */
	 class authorization extends Model
	 {
	 	protected  $table = "authorization";
	 	public function sysadmin(){
	 		return $this->belongsToMany('App\sysadmin','function_admin','rightId','adminId');
	 	}
	 	


	 } 
 ?>