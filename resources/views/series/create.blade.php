@extends('layout')

@section('cabecalho')
    Adicionar Série
@endsection

@section('conteudo')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post">
        <div class="row">
            <div class="col col-8">
                @csrf
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="" />
            </div>

            <div class="col col-2">
                @csrf
                <label for="qtd_temporadas">N° temporadas</label>
                <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas" placeholder="" />
            </div>

            <div class="col col-2">
                @csrf
                <label for="ep_por_temporada">Ep. por temporada</label>
                <input type="number" class="form-control" name="ep_por_temporada" id="ep_por_temporada" placeholder="" />
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Adicionar</button>
    </form>
@endsection
