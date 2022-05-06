@extends('layout')

@section('cabecalho')
    Temporadas de {{ $serie->nome }}
@endsection

@section('conteudo')
    <div class="row mb-4">
        <div class="col-md-12 align-center text-center">
            <img src="{{ $serie->capa_url }}" class="img-thumbnail" width="400px" height="400px" />
        </div>
    </div>

    @foreach ($temporadas as $temporada)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="/temporadas/{{ $temporada->id }}/episodios">Temporada {{ $temporada->numero }}</a>
            <span class="badge badge-secondary">
                {{ $temporada->getEpisodiosAssistidos()->count() }} / {{ $temporada->episodios->count() }}
            </span>
        </li>
    @endforeach
@endsection
