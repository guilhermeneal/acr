@extends('layouts.app')

@section('title', $categoria->nome.' · Estrada')

@section('content')
    <p><a class="muted" href="{{ route('categorias.index') }}">← Voltar às categorias</a></p>
    <section class="hero"><span class="eyebrow">Categoria</span><h1>{{ $categoria->nome }}</h1><p class="muted">{{ $categoria->descricao }}</p></section>
    @if($categoria->veiculos->count())<section class="grid">@foreach($categoria->veiculos as $veiculo)<article class="card"><a href="{{ route('veiculos.show', $veiculo) }}">@if($veiculo->imagem_url)<img src="{{ $veiculo->imagem_url }}" alt="{{ $veiculo->marca }} {{ $veiculo->modelo }}">@endif</a><div class="card-body"><h3><a href="{{ route('veiculos.show', $veiculo) }}">{{ $veiculo->marca }} {{ $veiculo->modelo }}</a></h3><p class="muted">{{ $veiculo->ano }} · {{ number_format($veiculo->quilometragem, 0, ',', '.') }} km</p><div class="price">{{ number_format((float) $veiculo->preco, 2, ',', '.') }} €</div></div></article>@endforeach</section>@else<p class="empty">Ainda não existem veículos disponíveis nesta categoria.</p>@endif
@endsection
