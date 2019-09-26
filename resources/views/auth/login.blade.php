@extends('auth.style')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
   <title>Login</title> 
    <h1>Login</h1>
      <form method="POST" >
        @csrf
        <input type="text"  placeholder="E-mail" required="required" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
        <input type="password" placeholder="Password" required="required" name="password" required autocomplete="current-password"/>


        <button type="submit" class="btn btn-primary btn-block btn-large">Entrar</button>
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
<p class="text-center"><a href="{{ route('home.create') }}">Criar uma conta</a></p>
</div>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>