@extends('layouts.app')

@section('content')

    <div class="row">
    

        <div class="col-md-8 col-md-offset-2">
           <div class="panel panel-default">
              <div class="panel-heading">Anúncios recentes</div>
                 <div class="panel-body">
                    @if(count($posts) > 0)
                     
                      @foreach($posts as $post)
                       <div class ="well">
                        <div class="row">
                          <div class="col-md-4 col-sm-4">
                           <a href="posts/{{$post->id}}"><img style="width:60%" src="storage/fotos/{{$post->foto_mercadoria}}"></a>

                          </div>
                          <div class="col-md-4 col-sm-8">
                            <h3><a href="posts/{{$post->id}}">{{$post->nome_mercadoria}}</a></h3>
                            <h4>R${{$post->preco_mercadoria}}</h4>
                            <h5>{{$post->tipo_negocio}}</small></h5>
                            <small>publicado em {{$post->created_at}} por {{$post->user->name}}</small>
                          </div>
                        </div>
                       </div>
                      @endforeach
                      {{$posts->links()}}

                      @else
                        <p>Nenhum anúncio encontrado</p>
                      @endif
        
                  </div>
             </div>
         </div>

@endsection
