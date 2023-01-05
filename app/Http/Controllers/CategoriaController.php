<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\ViewErrorBag;
// breaw help 
//php intaler
class CategoriaController extends Controller
{
   
    public function index(Request $request)
    {
        
       $busqueda = $request->busqueda;
       $categorias = Categoria::where('codigo','LIKE','%'.$busqueda.'%')
                ->orwhere('nombre','LIKE','%'.$busqueda.'%')
                ->latest('id')
                ->paginate(2);
     

        
        return view('categorias.index',compact('categorias','busqueda'));
      
    }

   
    public function create()
    {
        return view('categorias.create');
    }

  
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->codigo = $request->codigo;
        $categoria->nombre = $request->nombre;
        $categoria->save();
        return redirect()->route(('categorias.index'));
    }

    
    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));

    }

   
    public function edit(Categoria $categoria)
    {
       return view('categorias.edit', compact('categoria'));
    }

   
    public function update(Request $request, Categoria $categoria)
    {
        $categoria->update($request->all());
        return redirect()->route('categorias.index');
    }

   
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}
