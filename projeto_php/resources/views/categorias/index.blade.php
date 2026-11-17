@extends('layouts.app')

@section('title', 'Categorias · Estrada')

@section('content')
    <section class="hero"><span class="eyebrow">Descubra por tipo</span><h1>Categorias</h1><p class="muted">Escolha a categoria do veículo que procura.</p></section>
    <section class="grid">@forelse($categorias as $categoria)<article class="card"><div class="card-body"><h2><a href="{{ route('categorias.show', $categoria) }}">{{ $categoria->nome }}</a></h2><p class="muted">{{ $categoria->descricao ?: 'Explore os veículos desta categoria.' }}</p><span class="badge">{{ $categoria->veiculos_count }} anúncios</span></div></article>@empty<p class="empty">As categorias serão publicadas em breve.</p>@endforelse</section>
@endsection
