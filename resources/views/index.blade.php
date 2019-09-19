@extends('layouts.app')

@section('wrapper')


<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>           
<script type="text/javascript">
    $( document ).ready(function() {
        $('.telefone').mask('(00) 0 0000-0000');
        $('.dinheiro').mask('000.000.000.000.000,00', {reverse: true});
        $('.estado').mask('AA');
    });
</script>
<div id="container" style="width:100%; height:400px;">
        <script>
                document.addEventListener('DOMContentLoaded', function () {
        var myChart = Highcharts.chart('container', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Média de gastos por mês'
            },
            xAxis: {
                categories: ['Jan','Fev','Mar','Abr','Mai','Jun', 'Jul','Ago','Set', 'Out', 'Nov', 'Dez' ]
            },
            yAxis: {
                title: {
                    text: 'Consumo total'
                }
            },
            series: [{
                name: 'Contas',
                data: [{{$conMes['Jan']}}, {{$conMes['Fev']}}, {{$conMes['Mar']}}, {{$conMes['Abr']}},      {{$conMes['Mai']}},{{$conMes['Jun']}} ,{{$conMes['Jul']}},{{$conMes['Ago']}},           {{$conMes['Set']}},{{$conMes['Out']}},{{$conMes['Nov']}},{{$conMes['Dez']}} ]
            }, {
                name: 'Despesas',
                data: [{{$dispMes['Jan']}}, {{$dispMes['Fev']}}, {{$dispMes['Mar']}}, {{$dispMes['Abr']}},  {{$dispMes['Mai']}},{{$dispMes['Jun']}} ,{{$dispMes['Jul']}},{{$dispMes['Ago']}},       {{$dispMes['Set']}},{{$dispMes['Out']}},{{$dispMes['Nov']}},{{$dispMes['Dez']}}]
            }]
        });
    });

        </script>    
</div>
           <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Total Gasto</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        
                                        <tr>
                                            <th class="border-top-0">Contas</th>
                                            <th class="border-top-0">Despesas</th>
                                            <th class="border-top-0">Esse mês você ainda tem</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    <tr>
                                            
                                        <td class="txt-oflo dinheiro" id="dinheiro">{{$totalContas}}</td>
                                        <td class="txt-oflo dinheiro" id="dinheiro">{{$totalDispesas }}</td>
                                        <td class="txt-oflo dinheiro" id="dinheiro">(salario+extra)-(contas do mes+ despesas do mes)</td>
                                   </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Contas proximas do vencimento</h4>
                            </div>
 <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        
                                        <tr>
                                            <th class="border-top-0">Conta</th>
                                            <th class="border-top-0">Data</th>
                                            <th class="border-top-0">Preço</th>


                                        </tr>
                                    </thead>
                                <tbody>
                                    @foreach($Vencimento as $conta)
                                    <tr>
                                            
                                        <td class="txt-oflo">{{ $conta['local'] }}</td>
                                        <td class="txt-oflo">{{ $conta['data'] }}</td>
                                        <td class="txt-oflo">{{ $conta['preco'] }}</td>
                                   </tbody>
                                   @endforeach

                                   @if(empty($conta))
                                   <tr>
                                       <td colspan="2">Não existem contas pendentes.</td>
                                   </tr>
                                   @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

        

@endsection