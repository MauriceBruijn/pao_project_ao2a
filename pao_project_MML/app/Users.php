<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
	protected $primaryKey = 'id';
	public $incementing = false;
	protected $fillable = ['rank', 'name', 'email'];
	public $timestamps = true;
}
