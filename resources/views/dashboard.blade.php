@extends('layouts.app')

@section('content')

   <div class="row">
    

        <div class="col-md-8 col-md-offset-2">
           <div class="panel panel-default">
              <div class="panel-heading"><h4>Bem vindo {{ Auth::user()->name }}!</h4> </div>
          

         <div class="panel-body">
           
            <h2>Seus anúncios</h2>
            @if(count($posts)>0)
             <table class="table table-striped">
              <tr>
                <th>Nome da mercadoria</th>
                <th></th>
                <th></th>
              </tr>
                @foreach($posts as $post)
         
                  <tr>
                    <td><a href="posts/{{$post->id}}">{{$post->nome_mercadoria}}</a></td>
                    <td><a href="/lsaap/public/posts/{{$post->id}}/edit" class="btn btn-success">Editar</a></td>
                    <td>
                      {!!Form::open(['action'=>['PostsController@destroy', $post->id], 'method' => 'POST'])!!}
                      {{Form::hidden('_method', 'DELETE')}}
                      {{Form::submit('Remover',['class' => 'btn btn-danger'])}}
                      {!!Form::close()!!}
                    <td>
                  </tr>
                @endforeach
              </table>
              @else
               <p>- Você não possui nenhum anúncio registrado!</p>
               <br> 
              @endif
               <a href="/lsaap/public/posts/create" class="btn btn-primary">Criar Anúncio</a>
               
               
               
               
          
      

  
     
        
          </div>
        </div>
    </div>


@endsection
