<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class HomeAdmController extends Controller
{
    public function index(){
        $produtos = Produto::select('nome', 'estoque')->get();
        return view("home-adm", compact('produtos'));
    }

    public function gerarRelatorio(){
        $dados = Produto::all();
        $pdf = Pdf::loadView('relatorio', compact('dados'));
        return $pdf->download('relatorio.pdf');
    }


}
