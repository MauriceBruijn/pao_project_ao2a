<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
	protected $primaryKey = 'id';
	public $incrementing = false;
	protected $fillable = ['name', 'brand', 'color', 'price', 'img', 'description'];
	public $timestamps = false;
}