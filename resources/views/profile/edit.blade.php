@extends('templates.base')
@section('title', 'Editar Produto')
@section('h1', 'Editar Produto')

@section('content')
<div class="row">
    <div class="col-4">

        <form method="post" action="{{ route('usuarios.update', $usuario) }}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="name">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Gravar</button>
            </div>
        </form>

    </div>
</div>
@endsection