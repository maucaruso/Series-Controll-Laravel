<?php

namespace App\Services;

use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class CriadorDeSeries
{
    public function criarSerie(string $nome, int $qtdTemporadas, int $epPorTemporada, ?string $capa): Serie
    {
        DB::beginTransaction();
        $serie = Serie::create([
            'nome' => $nome,
            'capa' => $capa
        ]);
        $this->criarTemporadas($qtdTemporadas, $epPorTemporada, $serie);
        DB::commit();

        return $serie;
    }

    private function criarTemporadas(int $qtdTemporadas, int $epPorTemporada, Serie $serie): void
    {
        $qtdTemporadas = $qtdTemporadas;

        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            $this->criarEpisodios($epPorTemporada, $temporada);
        }
    }

    private function criarEpisodios(int $epPorTemporada, Temporada $temporada): void
    {
        for ($j = 1; $j <= $epPorTemporada; $j++) {
            $temporada->episodios()->create(['numero' => $j]);
        }
    }
}
