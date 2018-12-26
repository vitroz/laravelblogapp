@extends('adminlte::page')

@section('title', 'Criar Post')

@section('content_header')
    <h1>Criar Post</h1>
@endsection

@section('content')
		<form method="POST" action="/posts">

			@csrf
			
			<div class="form-group row">

				<div class="col-xs-4">
					
					<legend>Titulo</legend>
					
					<input type="text" name="titulo" class="form-control {{ $errors->has('titulo') ? 'has-error' : '' }} " value=" {{ old('titulo') }} " placeholder="Titulo">

				</div>

			</div>

			<div class="form-group row">

				<div class="col-xs-4">
					
					<legend>Descrição</legend>
					
					<input type="text" name="descricao" class="form-control {{ $errors->has('descricao') ? 'has-error' : '' }} " value=" {{ old('descricao') }} " placeholder="Descrição">

				</div>

			</div>

			<div class="form-group row">

				<div class="col-xs-4">
					
					<legend>Imagem de Capa (link)</legend>
					
					<input type="text" name="imagemdecapa" class="form-control {{ $errors->has('descricao') ? 'has-error' : '' }} " value=" {{ old('imagemdecapa') }} " placeholder="Descrição">

				</div>

			</div>	

			<div class="form-group row">
			  
			  <div class="col-xs-4">

			  	<legend>Categorias</legend>

			  	@forelse($categorias as $categoria)
			  
			    <div class="input-group">
			  
			      <span class="input-group-addon">
			  
			        <input type="checkbox" name="categorias[]" value="{{ $categoria->id }}" aria-label="...">
			  
			      </span>
			  
			      <input readonly type="text" class="form-control" value="{{ $categoria->titulo }}" aria-label="...">

			    </div>

			    @empty
					<p>Não há categorias cadastradas.</p>
				@endforelse

			  </div>

			</div>		

			<div class="form-group row">

				<div class="col-xs-9">
					
					<legend>Corpo</legend>
					
					<textarea rows="4" cols="50" name="corpo" class="form-control {{ $errors->has('descricao') ? 'has-error' : '' }} " value=" {{ old('descricao') }} " placeholder="Texto"></textarea>

				</div>

			</div>


			<fieldset class="form-group">

			    <legend>Status</legend>

			    <div class="form-check">

			      <label class="form-check-label">
			        <input type="radio" class="form-check-input" name="status" id="optAtivo" value="1" checked><span class="radioStatus">Ativo</span>
			      </label>

			    </div>

			    <div class="form-check">

			      <label class="form-check-label">
			        <input type="radio" class="form-check-input" name="status" id="optInativo" value="0">
			        <span class="radioStatus">Inativo</span>
			      </label>

			    </div>

			</fieldset>					

			<div class="form-group">
					
				<button class="btn btn-success" type="submit">Criar</button>
				
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
@stop






