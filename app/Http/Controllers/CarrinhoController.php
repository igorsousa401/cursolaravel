<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class CarrinhoController extends Controller
{
    public function carrinhoLista(){
        $itens = \Cart::getContent();
        return view('site.carrinho', compact('itens'));
    }

    public function adicionaCarrinho(Request $request){
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => abs($request->quantity),
            'attributes' => [
                'image' => $request->image,
            ],
        ]);

        return redirect()->route('site.carrinho')->with('sucesso', 'O produto foi inserido no carrinho com sucesso!');
    }

    public function removeCarrinho(Request $request){
        \Cart::remove($request->id);

        return redirect()->route('site.carrinho')->with('sucesso', 'O produto foi removido do carrinho com sucesso!');
    }

    public function atualizaCarrinho(Request $request){
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => abs($request->quantity),
            ],
        ]);

        return redirect()->route('site.carrinho')->with('sucesso', 'O produto foi atualizado no carrinho com sucesso!');
    }

    public function limparCarrinho(){
        \Cart::clear();
        return redirect()->route('site.carrinho')->with('aviso', 'O carrinho foi limpado com sucesso!');
    }
}
