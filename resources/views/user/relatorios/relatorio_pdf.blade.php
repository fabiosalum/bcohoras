<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório Banco de Horas</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #4D83FF;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #4D83FF;
        }

        .tabela1 {
            width: 60%;
            float: left;
            margin-right: 2%;
        }
        .tabela2 {
            width: 30%;
            float: left;
            margin-right: 2%;
        }

        .conteudo {

            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;

        }

        p {
            font-size: 15px;
            margin: 0;
            padding: 0;

        }

        .assinatura {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .ass{
            width: 48%;
            float: left;
            margin-right: 2%;
        }
    </style>
</head>

<body>

    @php
        use Illuminate\Support\Carbon;
        date_default_timezone_set('America/Sao_Paulo');
        setlocale(LC_ALL, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese-brazil', 'portuguese-brazilian', 'bra', 'brazil', 'br');
        setlocale(LC_TIME, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese-brazil', 'portuguese-brazilian', 'bra', 'brazil', 'br');

    @endphp


    <div>
        <h2 style="margin-top: -1em">Funcionário {{ $user->name }}</h2>
        <p> Setor de {{ $user->setor->nome }}</p>
        <p> Matrícula: {{ $user->matricula }}</p>
    </div>


    <div class="conteudo">
        <div class="tabela1">
            <h4 style="margin: 0 auto">Banco de Horas (Entradas)</h4>
            <div>
                <table class="styled-table">
                    <thead>
                        <tr>
                            {{-- <th>Funcionário</th> --}}
                            <th>Data</th>
                            <th>Qtde de Horas</th>
                            <th>Hora de início | final</th>
                            <th>Motivo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sol_entradas as $sol_entrada)
                            <tr>
                                {{-- <td>{{ $sol_entrada->users->name }}</td> --}}
                                <td>{{ Carbon::parse($sol_entrada->data_movimentacao)->format('d/m/Y') }}</td>
                                <td>{{ $sol_entrada->qtde_horas }}</td>
                                <td>{{$sol_entrada->hora_inicio}} | {{$sol_entrada->hora_final}}</td>
                                <td> {{ $sol_entrada->motivo }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tabela2">
            <h4 style="margin: 0 auto">Banco de Horas (Saídas)</h4>
            <div>
                <table class="styled-table">
                    <thead>
                        <tr>
                            {{-- <th>Funcionário</th> --}}
                            <th>Data</th>
                            <th>Qtde de Horas</th>
                            {{-- <th>Motivo</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sol_saidas as $sol_saida)
                            <tr>
                                {{-- <td>{{ $sol_saida->users->name }}</td> --}}
                                <td>{{ Carbon::parse($sol_saida->data_movimentacao)->format('d/m/Y') }}</td>
                                <td>{{ $sol_saida->qtde_horas }}</td>
                                {{-- <td> {{ $sol_saida->motivo }} </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div style="clear: both;"></div>

    <div class="total">
        <div>
                <h3 class="texto-total" style="margin: 0; padding: 0">Total de Horas</h3>
                <h5 style="font-size: 15px; margin-top: -1em">Total de Entradas = {{ $totalSolicitacoes_entradasFormatado }}</h4>
                <h5 style="font-size: 15px">Total de Saídas = {{ $totalSolicitacoes_saidasFormatado }}</h5>
            @if ($totalSolicitacoes_entradasFormatado >= $totalSolicitacoes_saidasFormatado)
                <h5 style="font-size: 15px; border: 1px solid black; padding: 5px; width: 35%">Total Geral = Saldo Positivo {{ $formatoDiferenca }}</h5>
            @else
                <h5  style="font-size: 15px">Total Geral = Saldo Negativo {{ $formatoDiferenca }}</h5>
            @endif
        </div>
    </div>


    <div style="margin-top: -1em">
        <p style="margin-bottom: 30px">Uberaba, {{Carbon::now()->formatLocalized('%A, %d de %B de %Y')}}</p>

    </div>


    <div class="assinatura">
        <div class="ass">
            <p>____________________________</p>
            <p>Assinatura {{$user->name}}</p>
        </div>
        <div class="ass">
            <p>____________________________</p>
            <p>Assinatura {{$user->supervisor->name}}</p>
        </div>
    </div>

</body>

</html>
