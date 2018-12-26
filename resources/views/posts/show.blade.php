@extends('adminlte::page')

@section('title', 'Posts')

@section('content_header')
    <h1>Posts</h1>
@stop

@section('content')

	<div class="container">
	    	<div class="row">
	    		<div class="col-xs-2">
	    			<h1>{{ $post->titulo }}</h1>
	    			<small>Criado em: {{ $post->created_at }}</small>
	    		</div>
	    	</div>

	    	<div class="row">
	    		<div class="col-xs-2">
	    			<span>{{ $post->descricao }}</span>
	    		</div>
	    	</div>

	    	<div class="row">
	    		<div class="col-xs-3">
	    			<span>Categoria(s):</span>
		    		@forelse($postCategorias as $categoria)
		    			<span class="label label-default"> {{ $categoria->titulo }}</span>
		    		@empty
		    			<span> Post não categorizado. </span>
		    		@endforelse	    			
	    		</div>
	    	</div>

	    	<div class="row padImgPost">
	    		<img class="imgCapaPost" src=" {{ $post->imagemdecapa }} ">
	    		
	    	</div>

	    	<div class="row">
	    		<div class="col-xs-8">
	    			<textarea rows="20" cols="150" readonly>{{ $post->corpo }}</textarea>
	    		</div>		    		
	    	</div>    		
	    	<div class="row">
	    		<div class="col-xs-2">		    			
		    		<button class="btn btn-default"><a href="/posts">Voltar</a></button>
	    		</div>
	    	</div>

	   </div>



@stop

