@extends('layouts.app')

@section('content')
 

<div class="container">
                          
  <h1>{{$post->nome_mercadoria}}</h1>
  <small>publicado em {{$post->created_at}} por {{$post->user->name}}</small>
  <br>
  <br>
  <div style="width:50%">
     <img style="width:80%" src="/lsaap/public/storage/fotos/{{$post->foto_mercadoria}}"><br>
     <br>
     <b>Descrição: </b>{{$post->descricao_mercadoria}}<br>
     <br>

      <b>Tipo: </b>{{$post->tipo_mercadoria}}<br>
      <b>Quantidade: </b>{{$post->quantidade_mercadoria}}<br>
      <b>Negocio: </b>{{$post->tipo_negocio}}<br>
      <h1>R$ {{$post->preco_mercadoria}}</h1><br>
 
  <hr>
  @if (!Auth::guest())
    @if(Auth::user()->id ==$post->user_id)
      <a href="/lsaap/public/posts/{{$post->id}}/edit" class="btn btn-primary">Editar</a>

        {!!Form::open(['action'=>['PostsController@destroy', $post->id], 'method' => 'POST',  'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Remover',['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
            
    @endif
  @endif
  <a href="{{ URL::previous() }}" class="btn btn-default">Voltar</a>
   </div>    
  <br>
  <br>
</div>

@endsection
