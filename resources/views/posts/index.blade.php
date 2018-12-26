@extends('adminlte::page')

@section('title', 'Posts')

@section('content_header')
    <h1>Posts</h1>
@stop

@section('content')
	<meta name="csrf-token" content="{{ csrf_token() }}" />

	<div class="container">
		<div class="row">
    		<div class="col-xs-2">
    			<legend>Titulo</legend>
    		</div>

    		<div class="col-xs-1">	    			
    			<legend>Status</legend>
    		</div>

    		<div class="col-xs-2">	    			
    			<legend>Descrição</legend>
    		</div>

    		<div class="col-xs-2">		    			
    			<legend>Opções</legend>
    		</div>
		</div>
		@forelse($posts as $post)
		    	<div class="row padCategorias">
		    		<div class="col-xs-2">
		    			<a href="/posts/{{ $post->id }}">{{ $post->titulo }}</a>
		    		</div>

		    		<div class="col-xs-1">	    			
				    	@if ($post->status == 1)
				    		<span class="label label-primary text-center">Ativo</span>
				    	@else
				    		<span class="label label-danger">Inativo</span>
				    	@endif
		    		</div>

		    		<div class="col-xs-2">
		    			<a href="/posts/{{ $post->id }}">{{ $post->descricao }}</a>
		    		</div>

		    		<div class="col-xs-1">		    			
			    		<button class="btn btn-default"><a href="/posts/{{ $post->id }}">Visualizar</a></button>
		    		</div>

		    		<div class="col-xs-1">		    			
			    		<button class="btn btn-default"><a href="/posts/{{ $post->id }}/edit">Editar</a></button>
		    		</div>
		    	</div>
		@empty
			<p>Não há categorias cadastradas.</p>
		@endforelse

		<div class="row">

			<div class="col-xs-6">
				<legend>Buscar Post</legend>

				<form id="formBusca">
				    @csrf
				    <div class="input-group">
				        <input type="text" class="form-control" id="titulo" name="titulo"
				            placeholder="Consultar posts"> <span class="input-group-btn">
				            <button id="btnBusca"t ype="submit" class="btn btn-default">
				                <span class="glyphicon glyphicon-search"></span>
				            </button>
				        </span>
				    </div>
				</form>			
			</div>
			
		</div>

		<div class="container">
		    <table class="table table-striped">
		        <thead>
		            <tr>
		                <th>Titulo</th>
		            </tr>
		        </thead>
		        <tbody id="tblPosts">
		        </tbody>
		    </table>
		</div>

		<hr>

		<div class="row">
			<div class="col-xs-6">
				<a href="/posts/create"><button class="btn btn-primary padNewPost">Novo Post</button></a>
			</div>
		</div>

	</div>

	<script type="text/javascript">

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }
		});


		 $(document).ready(function(){
		 	$('#formBusca').submit(function(e){
		 		e.preventDefault();
		 		$('#tblPosts').html('');
		 		titulo = $('#titulo').val();
		 		$.get('buscarposts', { input: titulo}, function(data){
		 			console.log(data);	
		 			for(var i = 0; i < data.length; i++){
		 				$('#tblPosts').append('<tr><td>'+data[i].titulo+'</td></tr>')
		 			}	 			
		 		})

		 	});
          });

	</script>


@stop

