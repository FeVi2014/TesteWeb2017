@if(count($errors) > 0)
@foreach($errors->all() as $error)
     <div class="alert alert-danger">
     @if($error == "The foto mercadoria failed to upload.")
        O carregamento da imagem falhou!<br> 
        O tamanho ou arquivo desta imagem pode não ser suportado, por favor utilize:<br>
        -Arquivos do tipo jpg, png ou gif;<br>
        -Tamanho inferior a 2MB;<br>
     @elseif($error == "These credentials do not match our records.")
     E-mail ou Senha invalidos!

     @else
        {{$error}}
     @endif
     </div>
@endforeach     
@endif

@if(session('sucess'))
    <div class="alert alert-success">
     {{session('sucess')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
     {{session('error')}}
    </div>
@endif