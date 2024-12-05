@extends('layouts.app2')

@section('content')
    <div class="listar-propiedades bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Lista de Propiedades</h2>

        <!-- Botón para agregar propiedad -->
        <a href="{{ url('/agregar-propiedad') }}" class="mb-4 inline-block px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Agregar Propiedad
        </a>

        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    
                    <th class="px-4 py-2 text-left">Dirección</th>
                    <th class="px-4 py-2 text-left">Tipo</th>
                    <th class="px-4 py-2 text-left">Estado</th>
                    <th class="px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($propiedades as $propiedad)
                    <tr>

                        <td class="px-4 py-2">{{ $propiedad->direccion }}</td>
                        <td class="px-4 py-2">{{ ucfirst($propiedad->tipo_propiedad) }}</td>
                        <td class="px-4 py-2">{{ ucfirst($propiedad->estado) }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('arrendador.showEditarPropiedad', $propiedad->id_propiedad) }}" class="text-blue-500 hover:text-blue-700">Editar</a>
                            |
                            <form action="{{ route('arrendador.destroy', $propiedad->id_propiedad) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
