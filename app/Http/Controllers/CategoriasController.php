<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Categoria;

class CategoriasController extends Controller
{
    public function __construct() {
        // middleware auth será aplicado a todos os métodos
        $this->middleware('auth');

        // ex.: $this->middleware('auth')->only(['create', 'store']);
        // ex.: $this->middleware('auth')->except('index');
    }
    public function index() {

     	$categorias = Categoria::all();

    	return view ('categorias.index')->withCategorias($categorias);
    }

    public function create() {

    	return view ('categorias.create');

    }

    public function show(Categoria $categoria) {

        return view ('categorias.show', compact('categoria'));

    }

    public function update(Categoria $categoria){

        $validatedAtributes = request()->validate([
            'titulo' => ['required', 'min:3'],
            'descricao' => ['required', 'min:3'],
            'status' => ['required']
        ]);

        $categoria->update($validatedAtributes);

        return redirect('/categorias');

        //dd(request()->all());

    }

    public function edit(Categoria $categoria){

        return view ('categorias.edit', compact('categoria'));

    }

    public function destroy(Categoria $categoria){

        $categoria->posts()->detach();
        $categoria->delete();

        return redirect('/categorias');

    }

    public function store() {

        $validatedAtributes = request()->validate([
            'titulo' => ['required', 'min:3'],
            'descricao' => ['required', 'min:3'],
            'status' => ['required']
        ]);

        Categoria::create($validatedAtributes);

    	return redirect('/categorias');

    }

}
