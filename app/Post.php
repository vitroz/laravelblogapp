<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['titulo', 'corpo', 'status', 'descricao', 'imagemdecapa'];

    public function categorias()
    {
    	return $this->belongsToMany('App\Categoria', 'post_categorias', 'post_id', 'categoria_id');
    }
}


