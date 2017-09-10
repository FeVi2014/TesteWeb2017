@extends('layouts.app')

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

<div class="container">
  <h2>Criar Anúncio</h2>

    {!! Form::open(['action'=> 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data','data-parsley-validate'=>'']) !!}
        <div class ="form-group">
             {{Form::label('nome_mercadoria', 'Nome')}}
             {{Form::text('nome_mercadoria', '', ['class' => 'form-control', 'placeholder' =>'nome da mercadoria','required'=>'','maxlength'=>'200'])}}
        </div>
        <div class ="form-group">
            {{Form::label('tipo_mercadoria', 'Tipo')}}
            {{Form::text('tipo_mercadoria', '', ['class' => 'form-control', 'placeholder' =>'exp.: eletrodomésticos, eletronicos, vestimentas ...','required'=>'','maxlength'=>'150'])}}
        </div>
        <div class ="form-group">
            {{Form::label('descricao_mercadoria', 'Descrição')}}
            {{Form::textarea('descricao_mercadoria', '', ['id'=> 'article-ckeditor', 'class' => 'form-control', 'placeholder' =>'informações relevantes sobre a mercadoria e sobre contato para a transação como: telefones, emails e etc...','required'=>''])}}
        </div>
        <div class ="form-group">
            {{Form::label('quantidade_mercadoria', 'Quantidade')}}
            {{Form::number('quantidade_mercadoria', '', ['class' => 'form-control', 'min' => '1', 'placeholder' =>'exp.: 1, 2, 3 ...','required'=>''])}}
        </div>
        <div class ="form-group">
            {{Form::label('preco_mercadoria', 'Preço')}}
            {{Form::number('preco_mercadoria', null, ['class' => 'form-control','step' => '0.01', 'min' => '0', 'placeholder' =>'R$ 0.00','required'=>''])}}
        </div>
        <div class ="form-group">
            {{Form::label('tipo_negocio', 'Tipo de Negócio')}}
            {{Form::select('tipo_negocio',['venda' => 'Venda','compra' => 'Compra'], null, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('foto_mercadoria', 'Imagem da Mercadoria')}} 
            {{Form::file('foto_mercadoria',['required'=>'','filemaxsize'=>'1999'])}}
        </div>
        <hr>
         {{Form::submit('Criar' , ['class'=>'btn btn-primary'])}}
         <a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar</a>
   
    {!! Form::close() !!}

</div>

@endsection

@section('scripts')
{!! Html::script('js/parsley.min.js') !!}
@endsection