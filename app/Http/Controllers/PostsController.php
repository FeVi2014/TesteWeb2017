<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::orderBy('created_at','desc')->paginate(7);
        
        return view('posts.index')->with('posts',$posts);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
           'nome_mercadoria' => 'required',
           'tipo_mercadoria' => 'required',
           'descricao_mercadoria' => 'required',
           'quantidade_mercadoria' => 'required',
           'preco_mercadoria' => 'required',
           'tipo_negocio' => 'required',
           'foto_mercadoria' => 'image|required|max:1999'
        ]);
        //Handle File Upload
        if($request->hasFile('foto_mercadoria'))
        {
        // Get filename with the extension
        $filenameWithExt = $request->file('foto_mercadoria')->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('foto_mercadoria')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        // Upload Image
        $path = $request->file('foto_mercadoria')->storeAs('public/fotos', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        $post = new Post;
        $post->nome_mercadoria = $request->input('nome_mercadoria');
        $post->tipo_mercadoria = $request->input('tipo_mercadoria');
        $post->descricao_mercadoria = $request->input('descricao_mercadoria');
        $post->quantidade_mercadoria = $request->input('quantidade_mercadoria');
        $post->preco_mercadoria = $request->input('preco_mercadoria');
        $post->tipo_negocio = $request->input('tipo_negocio');
        $post->user_id = auth()->user()->id;
        $post->foto_mercadoria = $fileNameToStore;
        $post->save();

        return redirect('posts')->with('sucess','Anúncio criado com sucesso!');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post  = Post::find($id);
        return view('posts.show')->with('post', $post);

    }

 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if(auth()->user()->id !==$post->user_id){
             return redirect('posts')->with('error','Acesso Negado!');
        }

        return view('posts.edit')->with('post',$post);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           $this->validate($request, [
                'nome_mercadoria' => 'required',
                'tipo_mercadoria' => 'required',
                'descricao_mercadoria' => 'required',
                'quantidade_mercadoria' => 'required',
                'preco_mercadoria' => 'required',
                'foto_mercadoria' => 'image|nullable|max:1999'
           ]);
           //Handle File Upload
           if($request->hasFile('foto_mercadoria'))
           {
           // Get filename with the extension
           $filenameWithExt = $request->file('foto_mercadoria')->getClientOriginalName();
           // Get just filename
           $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
           // Get just ext
           $extension = $request->file('foto_mercadoria')->getClientOriginalExtension();
           // Filename to store
           $fileNameToStore = $filename.'_'.time().'.'.$extension;
           // Upload Image
           $path = $request->file('foto_mercadoria')->storeAs('public/fotos', $fileNameToStore);
           }
      
 
  
            $post = Post::find($id);
            $post->nome_mercadoria = $request->input('nome_mercadoria');
            $post->tipo_mercadoria = $request->input('tipo_mercadoria');
            $post->descricao_mercadoria = $request->input('descricao_mercadoria');
            $post->quantidade_mercadoria = $request->input('quantidade_mercadoria');
            $post->preco_mercadoria = $request->input('preco_mercadoria');
            $post->tipo_negocio = $request->input('tipo_negocio');
        

            if($request->hasFile('foto_mercadoria')){
                if($post->foto_mercadoria != 'noimage.jpg'){
                    Storage::delete('public/fotos/'.$post ->foto_mercadoria);
                }

                $post->foto_mercadoria = $fileNameToStore;
            }
            $post->save();

            return redirect('dashboard')->with('sucess','Anúncio atualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if(auth()->user()->id !==$post->user_id){
              return redirect('dashboard')->with('error','Acesso Negado!');
        }

        if($post->foto_mercadoria != 'noimage.jpg'){
            Storage::delete('public/fotos/'.$post ->foto_mercadoria);
        }

      
        $post -> delete();
        return redirect('dashboard')->with('sucess', 'Anúncio removido com sucesso!');
    }

}
