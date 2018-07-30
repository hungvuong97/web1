<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deviceadmin extends Model
{
    protected $primaryKey = "deviceId";
    protected $table = "deviceadmin";
    public $timestamps = false;
}
