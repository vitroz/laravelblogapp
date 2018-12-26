<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

	protected $fillable = ['titulo','descricao','status'];

	public function posts()
	{
    	return $this->belongsToMany('App\Post', 'post_categorias', 'categoria_id', 'post_id');
	}
   
}
