<?php

namespace App\Http\Controllers;

use App\Episodio;
use Illuminate\Http\Request;
use App\Serie;
use App\Http\Requests\SeriesFormRequest;
use App\Services\CriadorDeSeries;
use App\Services\RemovedorDeSerie;
use App\Temporada;
use App\User;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{

    public function index(Request $request)
    {

        $series = Serie::query()->orderBy("nome")->get();
        $mensagem = $request->session()->get("mensagem");

        return view("series.index", compact("series", 'mensagem'));
    }

    public function create()
    {
        return view("series.create");
    }

    public function store(SeriesFormRequest $request, CriadorDeSeries $criadorDeSeries)
    {
        $serie = $criadorDeSeries->criarSerie($request->nome, $request->qtd_temporadas, $request->ep_por_temporada);

        $users = User::all();

        foreach ($users as $user) {
            $email = new \App\Mail\NovaSerie(
                $request->nome,
                $request->qtd_temporadas,
                $request->ep_por_temporada
            );

            $email->subject = 'Nova Série Adicionada';

            \Illuminate\Support\Facades\Mail::to($user)->send($email);
            sleep(5);
        }

        $request->session()->flash("mensagem", "Série {$serie->id} e suas temporadas e episódios criados com sucesso: {$serie->nome}");

        return redirect()->route('listar_series');
    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie)
    {
        $nomeSerie = $removedorDeSerie->removerSerie($request->id);

        $request->session()->flash("mensagem", "Série $nomeSerie e episódios removidos com sucesso");

        return redirect('/series');
    }

    public function editaNome(int $id, Request $request)
    {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }
}
