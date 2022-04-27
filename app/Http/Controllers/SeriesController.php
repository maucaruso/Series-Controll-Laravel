<?php

namespace App\Http\Controllers;

class SeriesController extends Controller
{
    public function listarSeries() {
        $series = [
            'Lost',
            'Agents of SHIELD'
        ];

        $html = "<ul>";
        foreach ($series as $serie) {
            $html .= "<li>$serie</li>";
        }
        $html .= "</ul>";

        echo $html;
    }
}
