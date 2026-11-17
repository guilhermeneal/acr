@extends('layouts.app')

@section('title', $veiculo->marca.' '.$veiculo->modelo.' · Estrada')

@section('content')
    <p><a class="muted" href="{{ route('veiculos.index') }}">← Voltar aos veículos</a></p>
    <article class="detail">
        @if($veiculo->imagem_url)<img src="{{ $veiculo->imagem_url }}" alt="{{ $veiculo->marca }} {{ $veiculo->modelo }}">@else<div class="empty">Imagem não disponível</div>@endif
        <div><span class="badge">{{ $veiculo->categoria->nome }}</span><h1>{{ $veiculo->marca }} {{ $veiculo->modelo }}</h1><p class="price">{{ number_format((float) $veiculo->preco, 2, ',', '.') }} €</p><p>{{ $veiculo->ano }} · {{ number_format($veiculo->quilometragem, 0, ',', '.') }} km</p><p>{{ $veiculo->descricao }}</p><p class="muted">Para mais informações, contacte <a href="mailto:contacto@estrada.pt">contacto@estrada.pt</a>.</p></div>
    </article>
@endsection
