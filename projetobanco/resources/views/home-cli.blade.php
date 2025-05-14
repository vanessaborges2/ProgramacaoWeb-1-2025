@extends('layout')
@section('principal')
  <h1>Bem vindo cliente! {{Auth::user()->name}} </h1>

  @if (!$pedido)
    <p> Seu carrinho está vazio! </p>
  @else
    <table class="table table-bordered">
        <tr>
          <td>Produto</td>
          <td>Quantidade</td>
          <td>Preço Unitário</td>
          <td>Subtotal</td>
          <td></td>
        </tr>
        @foreach($pedido->itens as $i)
          <tr>
            <td>{{ $i->produto->nome }}</td>
            <td>{{ $i->quantidade }}</td>
            <td>{{ number_format($i->preco, 2, ',', '.') }}</td>
            <td>{{ number_format($i->quantidade * $i->preco, 2, ',', '.') }}</td>
            <td><a href="/carrinho/remove/{{ $i->produto->id }}">Remover</a></td>
          </tr>
        @endforeach
    </table>
    <h4>Total do carrinho: R$ {{ number_format($pedido->total, 2, ',', '.') }}
    <h5><a href='/'>Continuar comprando</a></h5>
    <a href="/carrinho/fechar" class="btn btn-danger">Encerrar compra</a>
  @endif
@endsection
