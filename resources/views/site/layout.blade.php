<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Compiled and minified CSS -->
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
    <!-- Dropdown Structure -->
    <ul id='dropdown1' class='dropdown-content'>
      @foreach ($categoriasMenu as $categoria)
        <li><a href="{{route('site.categoria', $categoria->id)}}">{{$categoria->nome}}</a></li>
      @endforeach
    </ul>


    <!-- Dropdown Structure -->
    <ul id='dropdown2' class='dropdown-content'>
        <li><a href="{{route('admin.dashboard')}}"> Dashboard </a></li>
        <li><a href="{{route('login.logout')}}"> Sair </a></li>
    </ul>


    <nav class="red">
        <div class="nav-wrapper container">
          <a href="#" class="brand-logo center">Curso Laravel</a>
          <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a href="{{route('site.index')}}">Home</a></li>
            <li><a class='dropdown-trigger' href='#' data-target='dropdown1'>Categorias<i class="material-icons right">expand_more</i></a></li>
            <li><a href="{{route('site.carrinho')}}">Carrinho<span class="new badge blue" data-badge-caption="">{{\Cart::getContent()->count()}}</span></a></li>
          </ul>


          @auth
            <ul id="nav-mobile" class="right hide-on-med-and-down">
              <li><a class='dropdown-trigger' href='#' data-target='dropdown2'>Olá {{auth()->user()->firstname}}!<i class="material-icons right">expand_more</i></a></li>
            </ul>
          @else
            <ul id="nav-mobile" class="right hide-on-med-and-down">
              <li><a href='{{route('login.form')}}'> Logar <i class="material-icons right">lock</i></a></li>
            </ul>
          @endauth

        </div>
    </nav>
@yield('conteudo')



    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    <script>
      /* DROPDOWN */
      var elemDrop = document.querySelectorAll('.dropdown-trigger');
      var instanceDrop = M.Dropdown.init(elemDrop, {
        coverTrigger: false,
        constrainWidht: false
      });
    </script>
</body>
</html>