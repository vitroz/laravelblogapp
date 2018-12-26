<?php

namespace App\Http\Controllers;

use App\Post;
use App\Categoria;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct() {
        // middleware auth será aplicado a todos os métodos
        $this->middleware('auth');

        // ex.: $this->middleware('auth')->only(['create', 'store']);
        // ex.: $this->middleware('auth')->except('index');
    }

    public function index()
    {
        $posts = Post::all();

        return view ('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categorias = Categoria::all();

        return view ('posts.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        //dd(request()->all());

        $validatedAtributes = request()->validate([
            'titulo' => ['required', 'min:3'],
            'descricao' => ['required', 'min:3'],
            'imagemdecapa' => ['required', 'min:3'],
            'corpo' => ['required', 'min:20'],
            'status' => ['required']
        ]);

        $post = Post::create($validatedAtributes);

        if(isset(request()->categorias)){
           $post->categorias()->sync(request()->categorias, false);
        }else{
           $post->categorias()->sync(array());
        }

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $postCategorias = $post->categorias;
        return view ('posts.show', compact('post','postCategorias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categorias = Categoria::all();
        $ctgsPost = $post->categorias()->allRelatedIds();
        $ctgsPost = array_values((array)$ctgsPost);
        $ctgsPost = $ctgsPost[0];

        return view ('posts.edit', compact('post', 'categorias','ctgsPost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {
        
        $validatedAtributes = request()->validate([
            'titulo' => ['required', 'min:3'],
            'descricao' => ['required', 'min:3'],
            'imagemdecapa' => ['required', 'min:3'],
            'corpo' => ['required', 'min:20'],
            'status' => ['required']
        ]);

        $post->update($validatedAtributes);

        if(isset(request()->categorias)){
           $post->categorias()->sync(request()->categorias, false);
        }else{
            $post->categorias()->sync(array());
        }

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->categorias()->detach();
        $post->delete();

        return redirect('/posts');
    }

    /**
     * Busca posts por titulo na base de dados.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function buscar(){

        $input = request()->input('titulo');
        $postsfound = Post::where('titulo','LIKE','%'.$input.'%')->get();
        return response()->json($postsfound);

    }
}
