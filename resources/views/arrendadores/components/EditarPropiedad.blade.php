@extends('layouts.app2')

@section('content')
    <div class="editar-propiedad bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Editar Propiedad</h2>

        <form action="{{ route('arrendador.updatePropiedad', $propiedad->id_propiedad) }}" method="POST">
            @csrf
            @method('PUT')


            <div class="mb-4">
                <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
                <input type="text" id="direccion" name="direccion" value="{{ old('direccion', $propiedad->direccion) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>


            <div class="mb-4">
                <label for="tipo_propiedad" class="block text-sm font-medium text-gray-700">Tipo de propiedad</label>
                <select id="tipo_propiedad" name="tipo_propiedad" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="casa" {{ $propiedad->tipo_propiedad == 'casa' ? 'selected' : '' }}>Casa</option>
                    <option value="apartamento" {{ $propiedad->tipo_propiedad == 'apartamento' ? 'selected' : '' }}>Apartamento</option>
                    <option value="oficina" {{ $propiedad->tipo_propiedad == 'oficina' ? 'selected' : '' }}>Oficina</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                <select id="estado" name="estado" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="disponible" {{ $propiedad->estado == 'disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="no disponible" {{ $propiedad->estado == 'no disponible' ? 'selected' : '' }}>No disponible</option>
                </select>
            </div>

            @if (!$isArrendador)
                <div class="mb-4">
                    <label for="id_agencia" class="block text-sm font-medium text-gray-700">Agencia</label>
                    <select id="id_agencia" name="id_agencia" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        @foreach ($agencias as $agencia)
                            <option value="{{ $agencia->id_agencia }}" {{ $propiedad->id_agencia == $agencia->id_agencia ? 'selected' : '' }}>{{ $agencia->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Actualizar propiedad</button>
        </form>
    </div>
@endsection
