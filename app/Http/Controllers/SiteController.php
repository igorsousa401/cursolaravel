<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Gate;


class SiteController extends Controller
{
    public function index()
    {
        $produtos = Produto::paginate(6);
        //dd($produto);
        return view('site.home', compact('produtos'));
    }

    public function details($slug){
        $produto = Produto::where('slug', $slug)->first();

        //Gate::authorize('ver-produto', $produto);

        //$this->authorize('verProduto', $produto);

        if(auth()->user()->can('verProduto', $produto)) {
            return view('site.details', compact('produto'));
        }

        if(auth()->user()->cannot('verProduto', $produto)) {
            return redirect()->route('site.index');
        }

    }

    public function categoria($id) {
        $categoria = Categoria::find($id);
        $produtos_categoria = Produto::where('id_categoria', $id)->paginate(3);
        return view('site.categoria', compact('produtos_categoria', 'categoria'));
    }
}
