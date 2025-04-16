@extends('layout')
@section('principal')
    <h1>Editar Produto</h1>
    
    <form method="post" action="/produtos/{{ $produto-> id }}">
        @CSRF
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Informe o nome:</label>
            <input type="text" id="nome" name="nome" value="{{ $produto->nome}}" class="form-control" required="">
        </div>
    
        <div class="mb-3">
            <label for="descricao" class="form-label">Informe a descrição:</label>
            <textarea id="descricao" name="descricao" class="form-control" rows="4" required="">
                {{ trim($produto->descricao) }}
            </textarea>
        </div>
    
        <div class="mb-3">
            <label for="preco" class="form-label">Informe o preço:</label>
            <input type="number" id="preco" name="preco" value="{{ $produto->preco }}" class="form-control" required="">
        </div>
    
        <div class="mb-3">
            <label for="estoque" class="form-label">Informe o estoque:</label>
            <input type="number" id="estoque" name="estoque" value="{{ $produto->estoque}}" class="form-control" required="">
        </div>
    
        <div class="mb-3">
            <label for="categoria_id" class="form-label">Selecione a categoria:</label>
            <select id="categoria_id" name="categoria_id" class="form-select" required="">
                @foreach ($categorias as $c)
                    <option value="{{ $c->id }}" {{ $produto->categoria_id == $c->id ? "selected" : "" }} >
                        {{ $c->nome }}
                    </option>
                @endforeach
            </select>
        </div>
    
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection