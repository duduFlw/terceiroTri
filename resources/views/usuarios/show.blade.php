@extends('templates.base')
@section('title', 'Usuários')
@section('h1', 'Página de Usuários')

@section('content')
<div class="row">
    <div class="col">
        <p>
            @if (Auth::user())
                Olá, {{ Auth::user()->username }}!
            @endif
        </p>

        <a class="btn btn-primary" href="{{route('usuarios.inserir')}}" role="button">Cadastrar usuário</a>

    </div>
</div>

<div class="row">
    <table class="table">
        <tr>
            <th>ID</th>
            <th width="50%">Nome</th>
            <th>E-mail</th>
        </tr>
        @if (Auth::user() && Auth::user()->admin == 1)
        <tr style="background-color: #adb5bd">
        @else
        <tr style="background: none">
        @endif
        @foreach ($usuarios as $usuario)
            <td>{{ $usuario->id }}</td>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->email }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection