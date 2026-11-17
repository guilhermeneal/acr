@extends('layouts.app')

@section('title', 'Veículos à venda · Estrada')

@section('content')
    <section class="hero">
        <span class="eyebrow">O próximo caminho começa aqui</span>
        <h1>Veículos à venda</h1>
        <p class="muted">Explore anúncios de carros, motas e muito mais.</p>
    </section>

    @if($destaque)
        <a class="spotlight" href="{{ route('veiculos.show', $destaque) }}">
            <div><span class="badge">Destaque aleatório</span><h2>{{ $destaque->marca }} {{ $destaque->modelo }}</h2><p class="muted">{{ $destaque->categoria->nome }} · {{ $destaque->ano }} · {{ number_format($destaque->quilometragem, 0, ',', '.') }} km</p></div>
            <strong class="price">{{ number_format((float) $destaque->preco, 2, ',', '.') }} €</strong>
        </a>
    @endif

    <form class="filters" method="GET" action="{{ route('veiculos.index') }}">
        <input class="input search" type="search" name="pesquisa" value="{{ request('pesquisa') }}" placeholder="Pesquisar marca, modelo ou descrição">
        <select class="input" name="categoria"><option value="">Todas as categorias</option>@foreach($categorias as $categoria)<option value="{{ $categoria->id }}" @selected(request('categoria') == $categoria->id)>{{ $categoria->nome }}</option>@endforeach</select>
        <select class="input" name="ordenar"><option value="recentes" @selected($ordenacao === 'recentes')>Mais recentes</option><option value="preco_asc" @selected($ordenacao === 'preco_asc')>Preço crescente</option><option value="preco_desc" @selected($ordenacao === 'preco_desc')>Preço decrescente</option><option value="ano_desc" @selected($ordenacao === 'ano_desc')>Ano mais recente</option><option value="ano_asc" @selected($ordenacao === 'ano_asc')>Ano mais antigo</option></select>
        <button class="button" type="submit">Pesquisar</button>
    </form>

    @if($veiculos->count())
        <section class="grid" aria-label="Lista de veículos">
            @foreach($veiculos as $veiculo)
                <article class="card"><a href="{{ route('veiculos.show', $veiculo) }}">
                    @if($veiculo->imagem_url)<a href="{{ route('veiculos.show', $veiculo) }}"><img src="{{ $veiculo->imagem_url }}" alt="{{ $veiculo->marca }} {{ $veiculo->modelo }}"></a>@else<a href="{{ route('veiculos.show', $veiculo) }}"><img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='640' height='360' viewBox='0 0 640 360'%3E%3Crect width='640' height='360' fill='%23e6ebe6'/%3E%3Cpath d='M140 230h360l-35-75H220z' fill='%2396a89b'/%3E%3Ccircle cx='230' cy='240' r='28' fill='%235d7064'/%3E%3Ccircle cx='420' cy='240' r='28' fill='%235d7064'/%3E%3C/svg%3E" alt="Imagem não disponível"></a>@endif
                    <div class="card-body"><span class="badge">{{ $veiculo->categoria->nome }}</span><h3><a href="{{ route('veiculos.show', $veiculo) }}">{{ $veiculo->marca }} {{ $veiculo->modelo }}</a></h3><p class="muted">{{ $veiculo->ano }} · {{ number_format($veiculo->quilometragem, 0, ',', '.') }} km</p><div class="price">{{ number_format((float) $veiculo->preco, 2, ',', '.') }} €</div></div>
                </article>
            @endforeach
        </section>
        <div class="pagination">{{ $veiculos->links() }}</div>
    @else
        <p class="empty">Ainda não há veículos para mostrar com estes critérios.</p>
    @endif
@endsection
