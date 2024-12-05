<?php

namespace App\Http\Controllers;

use App\Models\Arrendatario; 
use App\Models\Arrendador;
use App\Models\Propiedad;
use App\Models\AgenciaArrendamiento;
use App\Models\HistorialArrendamiento;
use Illuminate\Http\Request;

class ArrendadorController extends Controller
{

// Mostrar el formulario para agregar propiedad
public function showAgregarPropiedad()
{
    // Obtener arrendadores y agencias
    $arrendadores = Arrendador::all();
    $agencias = AgenciaArrendamiento::all();

    // Verificar si el usuario es arrendador
    $isArrendador = auth()->user()->is_arrendador; // Asegúrate de que 'is_arrendador' exista en tu modelo de usuario

    // Pasar la variable a la vista
    return view('arrendadores.components.AgregarPropiedad', compact('arrendadores', 'agencias', 'isArrendador'));
}

 // Almacenar la propiedad
 public function storePropiedad(Request $request)
 {
     // Validación de los datos
     $request->validate([
         'direccion' => 'required|string|max:255',
         'tipo_propiedad' => 'required|in:casa,apartamento,oficina',
         'estado' => 'required|in:disponible,no disponible',
     ]);
 
     // Si el usuario es un arrendador, setear la agencia como null
     $id_agencia = auth()->user()->is_arrendador ? null : $request->id_agencia;
 
     // Crear la propiedad
     Propiedad::create([
         'direccion' => $request->direccion,
         'id_arrendador' => auth()->user()->arrendador->id_arrendador, // Suponiendo que el usuario tiene un arrendador asociado
         'id_agencia' => null,
         'tipo_propiedad' => $request->tipo_propiedad,
         'estado' => $request->estado,
     ]);
 
     // Redirigir a la vista con un mensaje de éxito
     return redirect()->route('arrendador.index')->with('success', 'Propiedad agregada correctamente');
 }
 
 // Mostrar todas las propiedades
 public function index()
 {
     // Obtener las propiedades solo para el arrendador autenticado
     $propiedades = Propiedad::where('id_arrendador', auth()->user()->arrendador->id_arrendador)->get();
 
     // Retornar la vista con las propiedades filtradas
     return view('arrendadores.components.ListarPropiedades', compact('propiedades'));
 }

 // Mostrar el formulario para editar la propiedad
 public function showEditarPropiedad($id)
 {
     $propiedad = Propiedad::findOrFail($id);
     $arrendadores = Arrendador::all();
     $agencias = AgenciaArrendamiento::all();
     // Determinar si el usuario es un arrendador
     $isArrendador = auth()->user()->is_arrendador; // Asegúrate de que el campo `is_arrendador` esté en el modelo User
    
     return view('arrendadores.components.EditarPropiedad', compact('propiedad', 'arrendadores', 'agencias', 'isArrendador'));
 }

 // Actualizar la propiedad
 public function updatePropiedad(Request $request, $id)
 {
     // Validación de los datos
     $request->validate([
         'direccion' => 'required|string|max:255',
         'tipo_propiedad' => 'required|in:casa,apartamento,oficina',
         'estado' => 'required|in:disponible,no disponible',
     ]);

     // Buscar la propiedad a actualizar
     $propiedad = Propiedad::findOrFail($id);

     // Si el usuario es un arrendador, setear la agencia como null
     $id_agencia = auth()->user()->is_arrendador ? null : $request->id_agencia;

     // Actualizar la propiedad
     $propiedad->update([
         'direccion' => $request->direccion,
         'id_agencia' => $id_agencia,
         'tipo_propiedad' => $request->tipo_propiedad,
         'estado' => $request->estado,
     ]);

     // Redirigir con mensaje de éxito
     return redirect()->route('arrendador.index')->with('success', 'Propiedad actualizada correctamente');
 }

 // Eliminar la propiedad
 public function destroy($id)
 {
     $propiedad = Propiedad::findOrFail($id);
     $propiedad->delete();
     
     return redirect()->route('arrendador.index')->with('success', 'Propiedad eliminada correctamente');
 }










    // Mostrar el formulario para crear un reporte
    public function showAgregarReporte()
    {
        // Obtener las propiedades del arrendador autenticado
        $propiedades = Propiedad::where('id_arrendador', auth()->user()->arrendador->id_arrendador)->get();

        return view('arrendadores.components.AgregarReporte', compact('propiedades'));
    }

    public function guardarReporte(Request $request)
    {
        // Validar los datos
        $request->validate([
            'identificacion' => 'required|numeric',
            'telefono' => 'required|string|max:15',
            'email' => 'nullable|email',
            'direccion_actual' => 'nullable|string|max:255',
            'estado_cumplimiento_pagos' => 'required|string|max:255',
            'referencias_personales' => 'nullable|string',
            'id_propiedad' => 'required|exists:propiedades,id_propiedad',
        ]);
    
        // Crear el arrendatario
        $arrendatario = Arrendatario::create([
            'id_usuario' => auth()->id(), // ID del usuario autenticado
            'identificacion' => $request->identificacion,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'direccion_actual' =>  Propiedad::find($request->id_propiedad)->direccion,
            'estado_cumplimiento_pagos' => $request->estado_cumplimiento_pagos,
            'referencias_personales' => $request->referencias_personales,
        ]);
    
        // Guardar el reporte en la tabla verificaciones
        //Verificacion::create([
            //'id_arrendatario' => $arrendatario->id_arrendatario,
            //'direccion' => Propiedad::find($request->id_propiedad)->direccion, // Dirección de la propiedad seleccionada
          //  'id_arrendador' => auth()->id(),
        //]);
    
        return redirect()->route('arrendador.showAgregarReporte')->with('message', 'Reporte creado exitosamente.');
    }
    
    





    public function verArrendatarios()
    {
        $userId = auth()->id();
    
        // Suponiendo que el usuario autenticado es un arrendador
        $arrendador = Arrendador::where('id_usuario', $userId)->first();
    
        if (!$arrendador) {
            return redirect()->back()->withErrors('No tienes propiedades registradas.');
        }
    
        $arrendatarios = Arrendatario::where('id_usuario', $userId)
            ->with(['propiedad' => function ($query) use ($arrendador) {
                $query->where('id_arrendador', $arrendador->id_arrendador);
            }])
            ->get();
    
        return view('arrendadores.components.VerArrendatarios', compact('arrendatarios'));
    }

    public function editarArrendatario($id)
{
    // Buscar el arrendatario por ID
    $arrendatario = Arrendatario::findOrFail($id);

    // Pasar los datos del arrendatario a la vista
    return view('arrendadores.components.EditarArrendatario', compact('arrendatario'));
}

public function actualizarArrendatario(Request $request, $id)
{
    // Validar los datos
    $request->validate([
        'identificacion' => 'required|numeric',
        'telefono' => 'required|string|max:15',
        'email' => 'required|email',
        'direccion_actual' => 'required|string|max:255',
        'estado_cumplimiento_pagos' => 'required|string|max:255',
        'referencias_personales' => 'nullable|string',
    ]);

    // Buscar el arrendatario por ID
    $arrendatario = Arrendatario::findOrFail($id);

    // Actualizar los datos
    $arrendatario->update([
        'identificacion' => $request->identificacion,
        'telefono' => $request->telefono,
        'email' => $request->email,
        'direccion_actual' => $request->direccion_actual,
        'estado_cumplimiento_pagos' => $request->estado_cumplimiento_pagos,
        'referencias_personales' => $request->referencias_personales,
    ]);

    return redirect()->route('arrendador.verArrendatarios')->with('message', 'Arrendatario actualizado exitosamente.');
}

public function eliminarArrendatario($id)
{
    // Buscar el arrendatario por ID y eliminarlo
    $arrendatario = Arrendatario::findOrFail($id);
    $arrendatario->delete();

    return redirect()->route('arrendador.verArrendatarios')->with('message', 'Arrendatario eliminado exitosamente.');
}

    
    






  // Mostrar la vista de perfil
  public function miPerfil()
  {
      $usuario =  auth()->user();
      return view('arrendadores.components.MiPerfil', compact('usuario'));
  }

 // Actualizar el perfil
public function actualizarPerfil(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:usuarios,email,' . auth()->user()->id_usuario . ',id_usuario',
        'password' => 'nullable|min:8|confirmed',
    ]);

    $usuario = auth()->user();
    $usuario->nombre = $request->name; // Cambié 'name' a 'nombre' según tu estructura de tabla
    $usuario->apellido = $request->apellido;
    $usuario->email = $request->email;

    if ($request->filled('password')) {
        $usuario->password = Hash::make($request->password);
    }

    $usuario->save();

    return redirect()->back()->with('message', 'Perfil actualizado correctamente.');
}










    public function buscar()
    {
        return view('arrendadores.components.buscar');
    }
}
