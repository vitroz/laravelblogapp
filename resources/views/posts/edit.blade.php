@extends('adminlte::page')

@section('title', 'Editar Post')

@section('content_header')
    <h1>Editar Post</h1>
@endsection

@section('content')
		<form method="POST" action="/posts/{{ $post->id }}">

			@method('PATCH')
			@csrf
			
			<div class="form-group row">

				<div class="col-xs-4">
					
					<legend>Titulo</legend>
					
					<input type="text" name="titulo" class="form-control {{ $errors->has('titulo') ? 'has-error' : '' }} " value=" {{ $post->titulo }} " placeholder="Titulo">

				</div>

			</div>

			<div class="form-group row">

				<div class="col-xs-4">
					
					<legend>Descrição </legend>
					
					<input type="text" name="descricao" class="form-control {{ $errors->has('descricao') ? 'has-error' : '' }} " value=" {{ $post->descricao }} " placeholder="Titulo">

				</div>

			</div>

			<div class="form-group row">
			  
			  <div class="col-xs-4">

			  	<legend>Categorias</legend>

			  	@forelse($categorias as $categoria)
			  
			    <div class="input-group">
			  
			      <span class="input-group-addon">

		      		@if(in_array($categoria->id, $ctgsPost))
		      		<input  type="checkbox" name="categorias[]" value="{{ $categoria->id }}" aria-label="..." checked>
		      		@else
		      		<input  type="checkbox" name="categorias[]" value="{{ $categoria->id }}" aria-label="...">			@endif   		
			 			  
			      </span>
			  
			      <input readonly type="text" class="form-control" value="{{ $categoria->titulo }}" aria-label="...">

			    </div>

			    @empty
					<p>Não há categorias cadastradas.</p>
				@endforelse

			  </div>

			</div>				

			<div class="form-group row">

				<div class="col-xs-4">
					
					<legend>Corpo</legend>
					
					<textarea rows="4" cols="50"  name="corpo" class="form-control {{ $errors->has('corpo') ? 'has-error' : '' }} " value=" {{ $post->corpo }} " placeholder="Titulo">{{ $post->corpo }}</textarea>

				</div>

			</div>

			<div class="form-group row">

				<div class="col-xs-4">
					
					<legend>Imagem de Capa <small>(link)</small></legend>
					
					
					<input type="text" name="imagemdecapa" class="form-control {{ $errors->has('imagemdecapa') ? 'has-error' : '' }} " value=" {{ $post->imagemdecapa }} " placeholder="Titulo">
					<img class="imgCapaPost" src=" {{ $post->imagemdecapa }} ">

				</div>

			</div>


			<fieldset class="form-group">

			    <legend>Status</legend>

			    <div class="form-check">

			      <label class="form-check-label">
			        <input type="radio" class="form-check-input" name="status" id="optAtivo" value="1" {{ $post->status=='1' ? 'checked' : '' }}><span class="radioStatus">Ativo</span>
			      </label>

			    </div>

			    <div class="form-check">

			      <label class="form-check-label">
			        <input type="radio" class="form-check-input" name="status" id="optInativo" value="0" {{ $post->status=='0' ? 'checked' : '' }}>
			        <span class="radioStatus">Inativo</span>
			      </label>

			    </div>

			</fieldset>					

			<div class="form-group">
					
				<button class="btn btn-success" type="submit">Salvar</button>
				
			</div>

			@if ($errors->any())

			<div class="alert alert-warning">

				<ul>

					@foreach ($errors->all() as $error)

						<li>{{ $error }}</li>

					@endforeach		

				</ul>

			</div>

			@endif

		</form>

		<form method="POST" action="/posts/{{ $post->id }}">

		@method('DELETE')
		@csrf

			<div class="field">
				
				<div class="control">

					<button type="submit" class="btn btn-danger">Apagar Post</button>					

				</div>

			</div>

		</form>
@stop