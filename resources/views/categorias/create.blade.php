@extends('adminlte::page')

@section('title', 'Criar Categoria')

@section('content_header')
    <h1>Criar Categoria</h1>
@endsection

@section('content')
		<form method="POST" action="/categorias">

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
					
					<input type="text" name="descricao" class="form-control {{ $errors->has('descricao') ? 'has-error' : '' }} " value=" {{ old('descricao') }} " placeholder="Titulo">

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






