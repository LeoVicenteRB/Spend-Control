@extends('auth.style')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"/></script>
<!------ Include the above in your HEAD tag ---------->

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

<div class="login">
    <title>Registro de Usuário</title>

    <h1>Registro</h1>
      <form method="POST" action="{{ route('home.store')}}">
        @csrf
        <input type="text"  placeholder="Nome" required="required" name="name"value="{{ old('name') }}" />
        <input type="text"  placeholder="E-mail" required="required" name="email"value="{{ old('email') }}" />
        <input type="text" placeholder="CPF" required="required" name="cpf" id="cpf" maxlength="14" value="{{ old('cpf') }}" />
        <input type="text" placeholder="Salario" required="required" name="salario" onKeyPress="return(moeda(this,'.',',',event))" value="{{ old('salario') }}" />
        <input type="password" placeholder="Senha" required="required" name="password" />
        <input type="password" placeholder="Confirmar Senha" required="required" name="passwordsame"/>


        <button type="submit" class="btn btn-primary btn-block btn-large">Cadastrar</button>
    </form>
    <br>
   <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- animation social -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9155049400353686"
     data-ad-slot="2205382250"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
</div>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

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