@extends('layouts.app2')

@section('content')
    <div class="flex h-screen bg-gray-100">


        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Bienvenido al Dashboard</h1>
                <p class="text-gray-600 mb-4">
                    Elegir a los inquilinos adecuados es fundamental para mantener la estabilidad y la rentabilidad en el negocio inmobiliario.
                    Con esta herramienta, podrás analizar y verificar el historial de los arrendatarios de manera eficiente.
                </p>

                <!-- Secciones informativas -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-blue-100 p-4 rounded-lg shadow-sm">
                        <h2 class="font-semibold text-blue-600">Importancia</h2>
                        <p>
                            La falta de herramientas avanzadas dificulta la selección de inquilinos confiables, lo que puede llevar a riesgos financieros y legales.
                        </p>
                    </div>
                    <div class="bg-green-100 p-4 rounded-lg shadow-sm">
                        <h2 class="font-semibold text-green-600">Objetivo</h2>
                        <p>
                            Implementar un sistema centralizado que te permita verificar el historial de inquilinos, reduciendo tus  riesgos y mejorando la rentabilidad.
                        </p>
                    </div>
                </div>

                <!-- Resumen de beneficios -->
                <div class="bg-yellow-100 p-6 rounded-lg shadow-md">
                    <h2 class="text-lg font-bold text-yellow-600 mb-2">Beneficios del Sistema</h2>
                    <ul class="list-disc pl-5 text-gray-700">
                        <li>Transparencia y confianza en la industria inmobiliaria.</li>
                        <li>Reducción de riesgos financieros y legales.</li>
                        <li>Optimización del tiempo y esfuerzo en el proceso de selección.</li>
                        <li>Mayor rentabilidad y sostenibilidad a largo plazo.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
