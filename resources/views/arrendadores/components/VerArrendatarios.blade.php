@extends('layouts.app2')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Arrendatarios Registrados</h1>

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">Identificación</th>
                <th class="border border-gray-300 px-4 py-2">Teléfono</th>
                <th class="border border-gray-300 px-4 py-2">Dirección Actual</th>
                <th class="border border-gray-300 px-4 py-2">Tipo de Propiedad</th>
                <th class="border border-gray-300 px-4 py-2">Estado de Pagos</th>
                <th class="border border-gray-300 px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($arrendatarios as $arrendatario)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $arrendatario->identificacion }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $arrendatario->telefono }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $arrendatario->direccion_actual }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        {{ $arrendatario->propiedad->tipo_propiedad ?? 'N/A' }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $arrendatario->estado_cumplimiento_pagos }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <!-- Botón Editar -->
                        <a href="{{ route('arrendador.editarArrendatario', $arrendatario->id_arrendatario) }}" 
                           class="text-blue-500">Editar</a>
                        
                        <!-- Botón Eliminar -->
                        <form action="{{ route('arrendador.eliminarArrendatario', $arrendatario->id_arrendatario) }}" 
                              method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" 
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este arrendatario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="border border-gray-300 px-4 py-2 text-center">
                        No se encontraron arrendatarios registrados.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
</div>
@endsection


