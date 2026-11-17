<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\View\View;

class CategoriaController extends Controller
{
    public function index(): View
    {
        $categorias = Categoria::query()->withCount(['veiculos' => fn ($query) => $query->where('vendido', false)])->orderBy('nome')->get();

        return view('categorias.index', compact('categorias'));
    }

    public function show(Categoria $categoria): View
    {
        $categoria->load(['veiculos' => fn ($query) => $query->where('vendido', false)->latest()]);

        return view('categorias.show', compact('categoria'));
    }
}
