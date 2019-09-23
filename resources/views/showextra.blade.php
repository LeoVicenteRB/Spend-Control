@extends('layouts.app')

@section('wrapper')


                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Dinheiro Extra</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        
                                        <tr>
                                            <th class="border-top-0">Origem</th>
                                            <th class="border-top-0">Data</th>
                                            <th class="border-top-0">Total recebido</th>
                                        </tr>
                                    </thead>
                                @foreach($extra as $extra)
                                    <?php
                                        $newDate = date("d-m-Y", strtotime($extra->data));
                                        $date = str_replace('-', '/', $newDate );
                                        $extra->data = $date;
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td class="txt-oflo">{{$extra -> origem }}</td>
                                            <td class="txt-oflo">{{$extra -> data }}</td>
                                            <td><span class="font-medium">{{$extra -> total}}</span></td>
                                        </tr>
                                    </tbody>
                                @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
@endsection