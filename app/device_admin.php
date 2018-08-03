<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class device_admin extends Model {
	//protected = "device_admin";
	public $timestamps = false;
	protected $table = "device_admin";
	// $table->varchar('adminId')->unsigned()->nullable();
}
