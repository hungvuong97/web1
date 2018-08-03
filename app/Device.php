<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
	protected $primaryKey = "deviceId";
    protected $table = "device";
    public $timestamps = false;
    public function sysadmin() {
        return $this->belongsToMany('App\sysadmin', 'device_admin', 'deviceId', 'adminId');
    }
}
