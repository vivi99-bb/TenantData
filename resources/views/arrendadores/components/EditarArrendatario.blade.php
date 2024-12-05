@extends('layouts.app2')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Editar Arrendatario</h1>

    <form action="{{ route('arrendador.actualizarArrendatario', $arrendatario->id_arrendatario) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Identificación -->
        <div class="mb-4">
            <label for="identificacion" class="block font-bold mb-1">Identificación</label>
            <input type="text" id="identificacion" name="identificacion" 
                   class="w-full border-gray-300 rounded-lg p-2" 
                   value="{{ $arrendatario->identificacion }}" required>
        </div>

        <!-- Teléfono -->
        <div class="mb-4">
            <label for="telefono" class="block font-bold mb-1">Teléfono</label>
            <input type="text" id="telefono" name="telefono" 
                   class="w-full border-gray-300 rounded-lg p-2" 
                   value="{{ $arrendatario->telefono }}" required>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block font-bold mb-1">Correo Electrónico</label>
            <input type="email" id="email" name="email" 
                   class="w-full border-gray-300 rounded-lg p-2" 
                   value="{{ $arrendatario->email }}" required>
        </div>

        <!-- Dirección actual -->
        <div class="mb-4">
            <label for="direccion_actual" class="block font-bold mb-1">Dirección Actual</label>
            <input type="text" id="direccion_actual" name="direccion_actual" 
                   class="w-full border-gray-300 rounded-lg p-2" 
                   value="{{ $arrendatario->direccion_actual }}" required>
        </div>

        <!-- Estado cumplimiento de pagos -->
        <div class="mb-4">
            <label for="estado_cumplimiento_pagos" class="block font-bold mb-1">Estado de Cumplimiento de Pagos</label>
            <select id="estado_cumplimiento_pagos" name="estado_cumplimiento_pagos" 
                    class="w-full border-gray-300 rounded-lg p-2" required>
                <option value="cumple" {{ $arrendatario->estado_cumplimiento_pagos == 'cumple' ? 'selected' : '' }}>Cumple</option>
                <option value="no_cumple" {{ $arrendatario->estado_cumplimiento_pagos == 'no_cumple' ? 'selected' : '' }}>No Cumple</option>
            </select>
        </div>

        <!-- Referencias personales -->
        <div class="mb-4">
            <label for="referencias_personales" class="block font-bold mb-1">Referencias Personales</label>
            <textarea id="referencias_personales" name="referencias_personales" 
                      class="w-full border-gray-300 rounded-lg p-2">{{ $arrendatario->referencias_personales }}</textarea>
        </div>

        <!-- Botón -->
        <div>
            <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Actualizar Arrendatario
            </button>
        </div>
    </form>
</div>
@endsection
