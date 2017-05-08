<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['title', 'description', 'local', 'remote', 'type', 'company_id'];
	protected $dates= ['deleted_at'];
	
	function company() {
		return $this->belongsTo('app\Company');
	}
}
