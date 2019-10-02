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
            <h4 class="card-title">Editar contas</h4>
            <form class="form-horizontal m-t-30" action="{{route('conta.update', $conta->id)}}" method="POST">
                @csrf
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      <h4 align="right">Conta mensal </h4>
                                <label class="switch ">
                                  <input type="checkbox" class="default" id="cb_conta_mensal">
                                        <span class="slider"></span>
                                 </label>
                      
                <div class="form-group" >
                    <label>Local da conta </label>
                    <input type="text" class="form-control" id="local" name="local" maxlength="20" placeholder="Ex: Banco, Lojas, etc..." value="{{ $conta['local'] }}" required="request">
                </div>
                <div class="form-group">
                    <label>Tipo de conta</label>
                    <input type="text" id="tipo" name="tipo" class="form-control"maxlength="20" placeholder=" Ex: Roupas,comidas, etc ..."value="{{ $conta['tipo'] }}"required="request">
                </div>
                <div class="form-group">
                   <?php
                        $newDate = date("d-m-Y", strtotime($conta->data));
                        $date = str_replace('-', '/', $newDate );
                        $conta->data = $date;
                    ?>
                    <label id="label_vencimento">Data de vencimento</label>
                    <input type="text" class="form-control" id="data" name="data" maxlength="10" onkeypress="mascaraData(this)" placeholder="00/00/0000"value="{{ $conta['data'] }}"required="request">
                </div>
                <div class="form-group">
                    <label>Preço</label>
                    <input type="text" class="form-control" placeholder="R$" id="preco" name="preco" onKeyPress="return(moeda(this,'.',',',event))"value="{{ $conta['preco'] }}" required="request">
                </div>
                <div>
                  <input type="hidden" name="id" value="{{ $conta['id'] }}">
                 <button type="update" class="btn btn-primary">Salvar</button>
                     </div>
            </form>
        </div>
    </div>
</div>






<script language="javascript"> 
$(function(){
  console.log("HTML CARREGADO !");

  $("#cb_conta_mensal").on("change", change_conta_tipo);

});

function change_conta_tipo(){
  var conta_tipo = $("#cb_conta_mensal").prop("checked");

  if (conta_tipo == true)
  {
    $("#data").attr("placeholder", "00").attr("maxlength", 2);
    $("#data").attr("name", "dia_venc");
    $("#label_vencimento").html("Dia do vencimento");
  } else {
    $("#data").attr("placeholder", "00/00/0000").attr("maxlength", 10);
    $("#data").attr("name", "data");
    $("#label_vencimento").html("Data do vencimento");
  }

  console.log("Conta tipo:", conta_tipo);
}

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
  function mascaraData(val) {
  var pass = val.value;
  var expr = /[0123456789]/;

  for (i = 0; i < pass.length; i++) {
    // charAt -> retorna o caractere posicionado no índice especificado
    var lchar = val.value.charAt(i);
    var nchar = val.value.charAt(i + 1);

    if (i == 0) {
      // search -> retorna um valor inteiro, indicando a posição do inicio da primeira
      // ocorrência de expReg dentro de instStr. Se nenhuma ocorrencia for encontrada o método retornara -1
      // instStr.search(expReg);
      if ((lchar.search(expr) != 0) || (lchar > 3)) {
        val.value = "";
      }

    } else if (i == 1) {

      if (lchar.search(expr) != 0) {
        // substring(indice1,indice2)
        // indice1, indice2 -> será usado para delimitar a string
        var tst1 = val.value.substring(0, (i));
        val.value = tst1;
        continue;
      }

      if ((nchar != '/') && (nchar != '')) {
        var tst1 = val.value.substring(0, (i) + 1);

        if (nchar.search(expr) != 0)
          var tst2 = val.value.substring(i + 2, pass.length);
        else
          var tst2 = val.value.substring(i + 1, pass.length);

        val.value = tst1 + '/' + tst2;
      }

    } else if (i == 4) {

      if (lchar.search(expr) != 0) {
        var tst1 = val.value.substring(0, (i));
        val.value = tst1;
        continue;
      }

      if ((nchar != '/') && (nchar != '')) {
        var tst1 = val.value.substring(0, (i) + 1);

        if (nchar.search(expr) != 0)
          var tst2 = val.value.substring(i + 2, pass.length);
        else
          var tst2 = val.value.substring(i + 1, pass.length);

        val.value = tst1 + '/' + tst2;
      }
    }

    if (i >= 6) {
      if (lchar.search(expr) != 0) {
        var tst1 = val.value.substring(0, (i));
        val.value = tst1;
      }
    }
  }

  if (pass.length > 10)
    val.value = val.value.substring(0, 10);
  return true;
}


 </script> 



@endsection