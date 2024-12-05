<?php

namespace App\Http\Controllers;

use App\Models\Arrendatario;
use Barryvdh\DomPDF\Facade\Pdf;  // Agregar esta importación para PDF
use Illuminate\Http\Request;

class ArrendatarioController extends Controller
{
    // Método para evaluar inquilino por cédula
// Método para evaluar inquilino por cédula
public function evaluarInquilino(Request $request)
{
    $identificacion = $request->identificacion;

    // Obtener los registros de arrendatarios con esa cédula
    $arrendatarios = Arrendatario::where('identificacion', $identificacion)->get();

    // Inicializar los contadores para "cumple" y "no cumple"
    $cumple = 0;
    $noCumple = 0;

    // Contar cuántos cumplen y cuántos no
    foreach ($arrendatarios as $arrendatario) {
        // Evaluar cumplimiento de pagos
        if ($arrendatario->estado_cumplimiento_pagos == 'cumple') {
            $cumple++;
        } else {
            $noCumple++;
        }

        // Evaluar las referencias personales (por ejemplo, "bueno" o "malo")
        $referencias = strtolower($arrendatario->referencias_personales);
        if (strpos($referencias, 'bueno') !== false) {
            $cumple++;
        } elseif (strpos($referencias, 'malo') !== false) {
            $noCumple++;
        }
    }

    // Puntaje total basado en la suma de "cumple" y "no cumple"
    $puntajeTotal = $cumple - $noCumple;

    // Clasificación dependiendo de los puntajes
    if ($cumple > $noCumple) {
        $estadoInquilino = 'Buen inquilino';
    } elseif ($cumple < $noCumple) {
        $estadoInquilino = 'Mal inquilino';
    } else {
        $estadoInquilino = 'Inquilino Promedio'; // Si son iguales
    }

    // Pasar los datos al frontend
    return view('arrendadores.components.buscar', compact(
        'arrendatarios', 'estadoInquilino', 'puntajeTotal', 'cumple', 'noCumple', 'identificacion'
    ));
}





public function generarPDF($identificacion)
{
    // Verificar si identificacion está vacía
    if (empty($identificacion)) {
        return redirect()->route('evaluar-inquilino')->withErrors(['error' => 'Identificación no válida.']);
    }

    $arrendatarios = Arrendatario::where('identificacion', $identificacion)->get();
    $puntajeCumplimiento = 0;
    $puntajeReferencias = 0;
    $comentarios = [];

    foreach ($arrendatarios as $arrendatario) {
        if ($arrendatario->estado_cumplimiento_pagos == 'cumple') {
            $puntajeCumplimiento += 1;
        } else {
            $puntajeCumplimiento -= 1;
        }

        $referencias = strtolower($arrendatario->referencias_personales);
        if (strpos($referencias, 'bueno') !== false) {
            $puntajeReferencias += 1;
        }
        if (strpos($referencias, 'malo') !== false) {
            $puntajeReferencias -= 1;
        }

        $comentarios[] = $arrendatario->referencias_personales;
    }

    $puntajeTotal = $puntajeCumplimiento + $puntajeReferencias;
    $estadoInquilino = $puntajeTotal > 0 ? 'Buen inquilino' : ($puntajeTotal < 0 ? 'Mal inquilino' : 'Inquilino Promedio');

    // Generar el PDF
    $pdf = Pdf::loadView('arrendadores.components.pdf_evaluacion', compact(
        'arrendatarios', 
        'estadoInquilino', 
        'puntajeTotal', 
        'puntajeCumplimiento', 
        'puntajeReferencias', 
        'comentarios'
    ));

    return $pdf->download('evaluacion_inquilino.pdf');
}

}
