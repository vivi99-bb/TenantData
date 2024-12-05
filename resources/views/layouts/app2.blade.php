<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard')</title>
    {{-- AdminLTE CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css" rel="stylesheet">
    {{-- Bootstrap CSS (opcional si ya está incluido en AdminLTE) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Tailwind CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    {{-- Estilos personalizados --}}
    <link rel="stylesheet" href="{{ asset('css/arrendadores/estilos.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @yield('css') {{-- Sección para incluir estilos adicionales --}}
</head>
<body class="hold-transition sidebar-mini layout-fixed bg-gray-100">
    <div class="wrapper">


        {{-- Contenedor principal con flex --}}
        <div class="flex">
            {{-- Menú lateral --}}
            <aside class="w-1/6 bg-gray-200 h-screen">
                @include('arrendadores.components.menu')
            </aside>

            {{-- Contenido principal --}}
            <main class="w-5/6 p-0 bg-gray-100">
                <section>
                    @yield('content_header')
                    {{-- Barra superior horizontal --}}
                    <div class="bg-transparent text-white flex justify-between items-center p-4 ">
                        <h1 class="text-xl font-semibold"></h1>
                        
                        <!-- Formulario para logout con POST -->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                Salir
                            </button>
                        </form>
                    </div>
                </section>
                
                

                <section>
                    @yield('content')
                </section>
            </main>
        </div>

        {{-- Footer opcional --}}
        @include('arrendadores.components.footer')
    </div>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    @yield('js')
</body>
</html>
