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
        <div class="form-group">
            @csrf
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="" />
        </div>

        <button type="submit" class="btn btn-primary mt-2">Adicionar</button>
    </form>
@endsection
