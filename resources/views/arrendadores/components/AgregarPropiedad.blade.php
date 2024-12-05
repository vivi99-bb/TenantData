@extends('layouts.app2')

@section('content')
    <div class="agregar-propiedad bg-white p-6 rounded shadow">
        <form action="{{ route('arrendador.storePropiedad') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
                <input type="text" id="direccion" name="direccion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Dirección" required>
            </div>

            <div class="mb-4">
                <label for="tipo_propiedad" class="block text-sm font-medium text-gray-700">Tipo de propiedad</label>
                <select id="tipo_propiedad" name="tipo_propiedad" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="casa">Casa</option>
                    <option value="apartamento">Apartamento</option>
                    <option value="oficina">Oficina</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                <select id="estado" name="estado" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="disponible">Disponible</option>
                    <option value="no disponible">No disponible</option>
                </select>
            </div>

            @if (!$isArrendador)
                <div class="mb-4">
                    <label for="id_agencia" class="block text-sm font-medium text-gray-700">Agencia</label>
                    <select id="id_agencia" name="id_agencia" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        @foreach ($agencias as $agencia)
                            <option value="{{ $agencia->id_agencia }}">{{ $agencia->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Agregar propiedad</button>
        </form>
    </div>
@endsection
