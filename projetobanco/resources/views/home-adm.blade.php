@extends('layout')
@section('principal')
  <h1>Bem vindo administrador! {{Auth::user()->name}} </h1>
  <h3><a href="/relatorio">Gerar relatório de produtos</a></h3>
  <h2>Estoque de Produtos</h2>
    <canvas id="graficoEstoque" width="600" height="300"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('graficoEstoque').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($produtos->pluck('nome')) !!},
                datasets: [{
                    label: 'Estoque',
                    data: {!! json_encode($produtos->pluck('estoque')) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.7)'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection