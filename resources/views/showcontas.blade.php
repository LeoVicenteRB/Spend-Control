@extends('layouts.app')

@section('wrapper')


                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Contas</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        
                                        <tr>
                                            <th class="border-top-0">Conta</th>
                                            <th class="border-top-0">Vencimento</th>
                                            <th class="border-top-0">Tipo de conta</th>
                                            <th class="border-top-0">Preço</th>
                                        </tr>
                                    </thead>
                                @foreach($contas as $conta)
                                <tbody>
                                    <tr>
                                            
                                        <td class="txt-oflo">{{$conta -> local }}</td>
                                        <td class="txt-oflo">{{$conta -> data }}</td>
                                        <td class="txt-oflo">{{$conta -> tipo }}</td>
                                        <td><span class="font-medium">{{$conta -> preco}}</span></td>
                                   </tbody>
                                @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
@endsection