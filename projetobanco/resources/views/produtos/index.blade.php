@extends('layout')
@section('principal')
    <h1>Produtos</h1>

    <a class="btn btn-primary mb-3" href="/produtos/create">Novo Produto</a> 

    @if (session('erro'))
        <div class="alert alert-danger">
            {{ session('erro')}}
        </div>
    @endif

    @if (session('sucesso'))
        <div class="alert alert-success">
            {{ session('sucesso')}}
        </div>
    @endif

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome do Produto</th>
                <th>Nome da Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody> 
            @foreach ($produtos as $p)
                <tr>
                    <td> {{ $p->id }}</td>
                    <td> {{ $p->nome }}</td>
                    <td> {{ $p->categoria->nome }}</td>
                    <td>
                        <a href="/produtos/{{ $p->id }}/edit" class="btn btn-warning">Editar</a>
                        <a href="/produtos/{{ $p->id }}" class="btn btn-info">Consultar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection