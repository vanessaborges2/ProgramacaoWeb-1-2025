<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeCliController extends Controller
{
    
    public function index(){
        $pedido = Pedido::where('user_id', Auth::id())
            ->where('status', 'aberto')
            ->with('itens.produto')
            ->first();
        return view('home-cli', compact('pedido'));
    }

}
