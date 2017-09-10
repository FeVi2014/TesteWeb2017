@extends('layouts.app')

@section('content')

<div class="container">
  <h2>Editar Anúncio</h2>

    {!! Form::open(['action'=> ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data','data-parsley-validate'=>'']) !!}
        <div class ="form-group">
             {{Form::label('nome_mercadoria', 'Nome')}}
             {{Form::text('nome_mercadoria', $post->nome_mercadoria, ['class' => 'form-control', 'placeholder' =>'nome da mercadoria','required'=>'','maxlength'=>'200'])}}
        </div>
        <div class ="form-group">
            {{Form::label('tipo_mercadoria', 'Tipo')}}
            {{Form::text('tipo_mercadoria', $post->tipo_mercadoria, ['class' => 'form-control', 'placeholder' =>'exp.: eletrodomésticos, eletronicos, vestimentas ...','required'=>'','maxlength'=>'150'])}}
        </div>
        <div class ="form-group">
            {{Form::label('descricao_mercadoria', 'Descrição')}}
            {{Form::textarea('descricao_mercadoria', $post->descricao_mercadoria, ['id'=> 'article-ckeditor', 'class' => 'form-control', 'placeholder' =>'informações relevantes sobre a mercadoria','required'=>''])}}
        </div>
        <div class ="form-group">
            {{Form::label('quantidade_mercadoria', 'Quantidade')}}
            {{Form::number('quantidade_mercadoria', $post->quantidade_mercadoria, ['class' => 'form-control', 'placeholder' =>'exp.: 1, 2, 3 ...','required'=>''])}}
        </div>
        <div class ="form-group">
            {{Form::label('preco_mercadoria', 'Preço')}}
            {{Form::number('preco_mercadoria', $post->preco_mercadoria, ['class' => 'form-control','step' => '0.01', 'min' => '0', 'placeholder' =>'R$ 0.00','required'=>''])}}
        </div>
        <div class ="form-group">
            {{Form::label('tipo_negocio', 'Tipo de Negócio')}}
            {{Form::select('tipo_negocio',[$post->tipo_negocio=>$post->tipo_negocio,'venda' => 'Venda','compra' => 'Compra'], null, ['class' => 'form-control','required'=>''])}}
        </div>
        <div class="form-group">
            {{Form::label('foto_mercadoria', 'Imagem da Mercadoria')}} 
            {{Form::file('foto_mercadoria',['filemaxsize'=>'1999'])}}
        </div>
      {{Form::hidden('_method','PUT')}}  
    {{Form::submit('Salvar' , ['class'=>'btn btn-primary'])}}
    <a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar</a>
  
   
{!! Form::close() !!}

</div>

@endsection
