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
                                            <th class="border-top-0">Ação</th>
                                        </tr>
                                    </thead>
                                @foreach($contas as $conta)
                                    <?php
                                        $newDate = date("d-m-Y", strtotime($conta->data));
                                        $date = str_replace('-', '/', $newDate );
                                        $conta->data = $date;
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td class="txt-oflo">{{$conta -> local }}</td>
                                            <td class="txt-oflo">{{$conta -> data }}</td>
                                            <td class="txt-oflo">{{$conta -> tipo }}</td>
                                            <td><span class="font-medium">{{$conta -> preco}}</span></td>
                                              <td>
                                        <form action="{{ route('conta.destroy', $conta->id ) }}" method="POST">
                                                <a class="btn btn-primary" href="{{  route('conta.editc', $conta -> id) }}">Edit</a>
                               
                                                @method('DELETE')
                                                @csrf
                                  
                                                <button type="submit" class="btn btn-danger" value="Delete">Delete</button>

                                                    </td>
                                        </form>
                                        </tr>
                                    </tbody>
                                @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
@endsection