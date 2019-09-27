@extends('layouts.app')

@section('wrapper')


<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>        
<script>
$(function(){
   $(".mascara").maskMoney({
      prefix: 'R$ ',
      allowNegative: true,
      thousands: '.',
      decimal: ','
   });
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
                               <h4 class="card-title">Relatório de gastos</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        
                                        <tr>
                                            <th class="border-top-0">Total de contas já cadastradas</th>
                                            <th class="border-top-0">Total de despesas já cadastradas</th>
                                            <th class="border-top-0">Esse mês você ainda tem</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    <tr>
                                        <td class="txt-oflo dinheiro" class="mascara">{{$totalContas}}</td>
                                        <td class="txt-oflo dinheiro" class="mascara">{{$totalDispesas }}</td>
                                        <td class="txt-oflo dinheiro" class="mascara">{{$Resto}}</td>
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
                                    @foreach($Vencimentos as $conta)
                                    <?php
                                        $newDate = date("d-m-Y", strtotime($conta['data']));
                                        $date = str_replace('-', '/', $newDate );
                                        $conta['data'] = $date;
                                    ?>
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