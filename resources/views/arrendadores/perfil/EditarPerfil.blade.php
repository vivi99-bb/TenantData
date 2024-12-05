<!-- resources/views/arrendadores/perfil/EditarPerfil.blade.php -->
<div class="editar-perfil">
    <form action="{{ route('arrendador.updatePerfil') }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ Auth::user()->name }}" required>
        <input type="email" name="email" value="{{ Auth::user()->email }}" required>
        <button type="submit">Actualizar Perfil</button>
    </form>
</div>
