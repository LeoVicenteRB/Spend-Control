@extends('layouts.app')

@section('wrapper')

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ops!</strong> Ocorreu um erro!<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

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
                                            <th class="border-top-0">Tipo de despesa</th>
                                            <th class="border-top-0">Data de pagamento</th>
                                            <th class="border-top-0">Preço</th>
                                            <th class="border-top-0">Ação</th>
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
                                               <td>
                                        <form action="{{ route('dispesas.destroy', $dispesas->id ) }}" method="POST">
                                                <a class="btn btn-primary" href="{{  route('dispesas.editd', $dispesas -> id) }}">Edit</a>
                               
                                                @method('DELETE')
                                                @csrf
                                  
                                                <button type="submit" class="btn btn-danger" value="Delete">Delete</button>

                                                    </td>
                                        </form>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
@endsection