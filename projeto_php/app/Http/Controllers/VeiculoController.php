<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VeiculoController extends Controller
{
    public function index(Request $request): View
    {
        $ordenacao = $request->query('ordenar', 'recentes');
        $colunasOrdenaveis = [
            'preco_asc' => ['preco', 'asc'],
            'preco_desc' => ['preco', 'desc'],
            'ano_desc' => ['ano', 'desc'],
            'ano_asc' => ['ano', 'asc'],
        ];
        [$coluna, $direcao] = $colunasOrdenaveis[$ordenacao] ?? ['created_at', 'desc'];

        $veiculos = Veiculo::query()
            ->with('categoria')
            ->where('vendido', false)
            ->when($request->filled('pesquisa'), function ($query) use ($request) {
                $termo = trim((string) $request->query('pesquisa'));
                $query->where(function ($subquery) use ($termo) {
                    $subquery->where('marca', 'like', "%{$termo}%")
                        ->orWhere('modelo', 'like', "%{$termo}%")
                        ->orWhere('descricao', 'like', "%{$termo}%");
                });
            })
            ->when($request->filled('categoria'), fn ($query) => $query->where('categoria_id', $request->integer('categoria')))
            ->orderBy($coluna, $direcao)
            ->paginate(9)
            ->withQueryString();

        $categorias = Categoria::query()->orderBy('nome')->get();
        $destaque = Veiculo::query()->with('categoria')->where('vendido', false)->inRandomOrder()->first();

        return view('veiculos.index', compact('veiculos', 'categorias', 'destaque', 'ordenacao'));
    }

    public function show(Veiculo $veiculo): View
    {
        $veiculo->load('categoria');

        return view('veiculos.show', compact('veiculo'));
    }
}
