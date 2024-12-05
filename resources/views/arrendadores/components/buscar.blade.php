@extends('layouts.app2')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Evaluar Inquilino</h1>

    <!-- Formulario para ingresar la cédula -->
    <form action="{{ url('/buscar') }}" method="GET">
        @csrf
        <div class="mb-4">
            <label for="identificacion" class="block font-bold mb-1">Cédula del Inquilino</label>
            <input type="text" id="identificacion" name="identificacion" 
                   class="w-full border-gray-300 rounded-lg p-2" required>
        </div>

        <div>
            <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Evaluar Inquilino
            </button>
        </div>
    </form>

    <!-- Mostrar la evaluación solo si hay resultados -->
    @isset($estadoInquilino)
        <div class="mt-6">
            <h2 class="text-xl font-bold mb-4">Resultados de la Evaluación</h2>

            <!-- Barra roja de advertencia, solo si el estado es 'No Cumple' -->
            @if($estadoInquilino == 'No Cumple')
                <div id="barraAdvertencia" class="bg-red-500 text-white p-4 rounded-lg mb-4 flex justify-between items-center">
                    <span>El inquilino no cumple con los requisitos establecidos.</span>
                    <button id="cerrarBarra" class="bg-red-700 text-white p-2 rounded-full">X</button>
                </div>
            @endif

            <!-- Mostrar la evaluación -->
            <p class="mb-4">Puntaje Total: {{ $puntajeTotal }}</p>
            <p class="mb-4">Clasificación: {{ $estadoInquilino }}</p>

            <!-- Gráfico de barras -->
            <canvas id="graficoEvaluacion" width="400" height="200"></canvas>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                var ctx = document.getElementById('graficoEvaluacion').getContext('2d');
                var cumple = {{ $cumple }};  // Suma de los puntajes 'Cumple'
                var noCumple = {{ $noCumple }};  // Suma de los puntajes 'No Cumple'
                
                var grafico = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Cumple', 'No Cumple'],
                        datasets: [{
                            label: 'Cumplimiento', 
                            data: [cumple, noCumple],
                            backgroundColor: ['#4CAF50', '#F44336'],  // Verde para 'Cumple', rojo para 'No Cumple'
                            borderColor: ['#388E3C', '#D32F2F'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Función para cerrar la barra roja
                document.getElementById('cerrarBarra').addEventListener('click', function() {
                    document.getElementById('barraAdvertencia').style.display = 'none';
                });
            </script>

            
            

            <h3 class="text-lg font-bold mt-4">Comentarios de Referencias Personales</h3>
<table class="min-w-full table-auto border-collapse border border-gray-200">
    <thead>
        <tr class="bg-gray-100">
            <th class="px-4 py-2 text-left border border-gray-300">Usuario Registrante</th>
            <th class="px-4 py-2 text-left border border-gray-300">Referencia Personal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($arrendatarios as $arrendatario)
            <tr>
                <td class="px-4 py-2 border border-gray-300">{{ $arrendatario->usuario->nombre }}</td> <!-- Nombre del usuario -->
                <td class="px-4 py-2 border border-gray-300">{{ $arrendatario->referencias_personales }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


            <!-- Botón para descargar el PDF -->
            @isset($identificacion)
                <a href="{{ route('generar-pdf', ['identificacion' => $identificacion]) }}" 
                   class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded">
                    Descargar Evaluación en PDF
                </a>
            @else
                <p>No se puede generar el PDF sin una identificación válida.</p>
            @endisset
        </div>
    @endisset
</div>
@endsection
