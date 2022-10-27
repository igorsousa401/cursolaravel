

@if($mensagem = Session::get('erro'))
    <p>{{$mensagem}}</p>
@endif

@if($errors->any())
    @foreach ($errors->all() as $error)
        {{$error}}<br>
    @endforeach
@endif

<div class="row container center ">
    <form style="width: 70%;"  class="center " action="{{route('login.auth')}}" method="POST">
        @csrf
        Email:<br>
        <input  type="email" name="email"><br>
        Senha:<br>
        <input type="password" name="password"><br>
        <input type="checkbox" name="remember">Lembrar-me<br>
        
        <button type="submit" class="btn-large green"> Entrar </button>
    </form>
</div>
    
