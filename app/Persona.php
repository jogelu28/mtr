<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
	use Searchable;
    protected $fillable=['name','apellido','avatar'];
}


