<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
	protected $primaryKey = "deviceId";
    protected $table = "device";
    public $timestamps = false;
}
