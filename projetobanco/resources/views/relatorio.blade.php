<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Produtos</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        .titulo {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }

        .tabela {
            width: 100%;
            border-collapse: collapse;
        }

        .tabela th, .tabela td {
            border: 1px solid #000;
            padding: 6px 10px;
            text-align: left;
        }

        .tabela th {
            background-color: #f0f0f0;
        }

        .footer {
            position: absolute;
            bottom: 30px;
            text-align: center;
            width: 100%;
            font-size: 10px;
            color: #555;
        }

        .row {
            display: flex;
            justify-content: space-between;
        }

        .col {
            width: 48%;
        }
    </style>
</head>
<body>

    <div class="titulo">Relatório de Produtos</div>

    <div class="row">
        <div class="col">Data: {{ date('d/m/Y') }}</div>
    </div>

    <table class="tabela">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Estoque</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dados as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->estoque }}</td>
                    <td>R$ {{ number_format($item->preco, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Relatório gerado em {{ now()->format('d/m/Y H:i') }}
    </div>

</body>
</html>