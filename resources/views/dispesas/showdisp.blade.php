@extends('layouts.app')

@section('wrapper')

<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Contas</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Despesas</th>
                                            <th class="border-top-0">Tipo de conta</th>
                                            <th class="border-top-0">Data de pagamento</th>
                                            <th class="border-top-0">Preço</th>
                                        </tr>
                                    </thead>
                                    @foreach($dispesas as $dispesas)
                                     <?php
                                        $newDate = date("d-m-Y", strtotime($dispesas->datap));
                                        $date = str_replace('-', '/', $newDate );
                                        $dispesas->datap = $date;
                                    ?>
                                    <tbody>
                                        <td class="txt-oflo">{{$dispesas -> local }}</td>
                                        <td class="txt-oflo">{{$dispesas -> tipo }}</td>
                                        <td class="txt-oflo">{{$dispesas -> datap }}</td>
                                        <td><span class="font-medium">{{$dispesas -> preco}}</span></td>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
@endsection