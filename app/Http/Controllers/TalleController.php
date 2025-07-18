<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Talles;
use Illuminate\Database\QueryException;

class TalleController extends Controller
{
    // Crear un nuevo talle
    public function store(Request $request)
    {
        $request->validate([
            'talle' => 'required|string|max:5',
        ]);

        Talles::create([
            'talle' => $request->input('talle')
        ]);

        return redirect()
            ->route('admin.section', ['seccion' => 'talles'])
            ->with('feedback.message', 'Talle creado correctamente')
            ->with('feedback.type', 'success');
    }

    // Actualizar un talle
    public function update(Request $request, $id)
    {
        $request->validate([
            'talle' => 'required|string|max:5',
        ]);

        $talle = Talles::findOrFail($id);
        $talle->update([
            'talle' => $request->input('talle')
        ]);

        return redirect()
            ->route('admin.section', ['seccion' => 'talles'])
            ->with('feedback.message', 'Talle actualizado correctamente')
            ->with('feedback.type', 'success');
    }

    // Eliminar un talle
    public function destroy($id)
    {
        try {
            $talle = Talles::findOrFail($id);
            $talle->delete();

            return redirect()
                ->route('admin.section', ['seccion' => 'talles'])
                ->with('feedback.message', 'Talle eliminado correctamente')
                ->with('feedback.type', 'success');
        } catch (QueryException $e) {
            return redirect()
                ->route('admin.section', ['seccion' => 'talles'])
                ->with('feedback.message', $e->getCode() === '23000'
                    ? 'No se puede eliminar este talle porque está en uso por uno o más artículos.'
                    : 'Error al intentar eliminar el talle.')
                ->with('feedback.type', 'danger');
        }
    }
}
