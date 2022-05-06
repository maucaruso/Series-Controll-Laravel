<?php

namespace App\Listeners;

use App\Events\NovaSerie;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarEmailNovaSerieCadastrada
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NovaSerie  $event
     * @return void
     */
    public function handle(NovaSerie $event)
    {
        $users = User::all();

        foreach ($users as $index => $user) {
            $multiplicador = $index + 1;

            $email = new \App\Mail\NovaSerie(
                $event->nomeSerie,
                $event->qtdTemporadas,
                $event->qtdEpisodios
            );

            $email->subject = 'Nova Série Adicionada';

            $when = now()->addSecond(10 * $multiplicador);

            \Illuminate\Support\Facades\Mail::to($user)->later($when, $email);
        }
    }
}
