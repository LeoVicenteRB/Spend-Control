@extends('layouts.app')

@section('wrapper')
<script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"/></script>
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
        <div class="card card-body">
<div class="container">
    <h1>Editar perfil</h1>
    <hr>
    <div class="row">
      
      <div class="col-md-9 personal-info">
        <h3>Informações pessoais</h3>
        
        <form class="form-horizontal" action="{{action('UserController@update')}}"method="post" role="form">
            @csrf
          <div class="form-group">
            <label class="col-lg-3 control-label">Nome:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" placeholder="Nome" required="required" name="name" value="{{ $user['name'] }}">
            </div>
          </div>
           <div class="form-group">
            <label class="col-lg-3 control-label">CPF:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" placeholder="CPF" id="cpf" required="required" name="cpf" id="CPF" maxlength="14" value="{{ $user['cpf'] }}">
            </div>
          </div>
        
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" placeholder="E-mail" required="required" name="email"value="{{ $user['email'] }}" >
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Salário:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" placeholder="Salario" required="required" name="salario" onKeyPress="return(moeda(this,'.',',',event))" value="{{ $user['salario'] }}">
            </div>
          </div>
          <div class="form-group">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </div>
        </form>
      </div>
      </div>
      

<script language="javascript">   
function moeda(a, e, r, t) {
    let n = ""
      , h = j = 0
      , u = tamanho2 = 0
      , l = ajd2 = ""
      , o = window.Event ? t.which : t.keyCode;
    if (13 == o || 8 == o)
        return !0;
    if (n = String.fromCharCode(o),
    -1 == "0123456789".indexOf(n))
        return !1;
    for (u = a.value.length,
    h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
        ;
    for (l = ""; h < u; h++)
        -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
    if (l += n,
    0 == (u = l.length) && (a.value = ""),
    1 == u && (a.value = "0" + r + "0" + l),
    2 == u && (a.value = "0" + r + l),
    u > 2) {
        for (ajd2 = "",
        j = 0,
        h = u - 3; h >= 0; h--)
            3 == j && (ajd2 += e,
            j = 0),
            ajd2 += l.charAt(h),
            j++;
        for (a.value = "",
        tamanho2 = ajd2.length,
        h = tamanho2 - 1; h >= 0; h--)
            a.value += ajd2.charAt(h);
        a.value += r + l.substr(u - 2, u)
    }
    return !1
}
  $(document).ready(function(){
    $("#cpf").mask("999.999.999-99");
  });
    </script>
<hr>
@endsection