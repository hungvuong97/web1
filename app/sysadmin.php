<?php
	namespace App;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Foundation\Auth\User as Authenticatable;
	/**
	  * 
	  */
	 class sysadmin extends Model
	 {

	 //	protected $primaryKey = 'adminId';
	 	protected $table = "sysadmin";
	 	public function device(){
	 		return $this->belongsToMany('App\device','device_admin','adminId','deviceId');
	 	}

	 	public function authorization(){
	 		return $this->belongsToMany('App\authorization','function_admin','adminId','rightId');
	 	}
	 } 
 ?>