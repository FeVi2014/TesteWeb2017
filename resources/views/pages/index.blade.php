@extends('layouts.app')

@section('content')

  <div class="jumbotron">
      <div class="container">
        <h1 class="display-1">Negociações Web</h1>
        <p>A plataforma de negociação mais usada do Brasil.</p>
        <br>
        @if (Auth::guest())
          <p><a class="btn btn-primary btn-lg" href="register" role="button">Comece a negociar!</a>  
           &nbsp &nbsp 
          <a class="btn btn-success btn-lg" href="login" role="button">Já sou cadastrado</a></p>
        @else
        <!--do nothing-->
        @endif     
      </div>
    </div>
  <div class="container">
   <h4>Anúncios Recentes</h4>
   <hr>
   <div class="row">
      @if(count($posts) > 0)
        @foreach($posts as $post)
         <div class="col-md-4">
            <a href="posts/{{$post->id}}"><img style="width:220px; height:190px; border:1px gray solid;" src="storage/fotos/{{$post->foto_mercadoria}}"></a>
            <h3><a href="posts/{{$post->id}}">{{$post->nome_mercadoria}}</a></h3>
            <h4>R${{$post->preco_mercadoria}}</h4>
            <h5>{{$post->tipo_negocio}}</small></h5>
            <br>
         </div>   
        @endforeach
        <a  href="/lsaap/public/posts" class="btn btn-default btn-lg pull-right">mais -></a>
      @else
        <p>Nenhum anúncio encontrado</p>
      @endif
    </div>
    <br>
    <hr>
    <footer>
      <p>Feito por Felipe Videira. Os dados contidos nesse website são puramente fictícios com o objetivo de concluir um processo seletivo de estágio - 2017</p>
    </footer>
 </div>


@endsection        
       



