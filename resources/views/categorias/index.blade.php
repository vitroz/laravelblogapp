@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias</h1>
@stop

@section('content')

	<div class="container">
		<div class="row">
    		<div class="col-xs-2">
    			<legend>Titulo</legend>
    		</div>

    		<div class="col-xs-1">	    			
    			<legend>Status</legend>
    		</div>

    		<div class="col-xs-2">		    			
    			<legend>Opções</legend>
    		</div>
		</div>
		@forelse($categorias as $categoria)
		    	<div class="row padCategorias">
		    		<div class="col-xs-2">
		    			<a href="/categorias/{{ $categoria->id }}">{{ $categoria->titulo }}</a>
		    		</div>

		    		<div class="col-xs-1">	    			
				    	@if ($categoria->status == 1)
				    		<span class="label label-primary text-center">Ativa</span>
				    	@else
				    		<span class="label label-danger">Inativa</span>
				    	@endif
		    		</div>

		    		<div class="col-xs-2">		    			
			    		<button class="btn btn-default"><a href="/categorias/{{ $categoria->id }}/edit">Editar</a></button>
		    		</div>
		    	</div>
		@empty
			<p>Não há categorias cadastradas.</p>
		@endforelse

		<div>
			<a href="/categorias/create"><button class="btn btn-primary">Nova Categoria</button></a>
		</div>

	</div>


@stop

