<?php

namespace App\Http\Controllers;

use App\Models\Bottle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BottlesController extends Controller
{
    public function getAllBottles()
    {
        $data = Bottle::all();

        return response()->json($data);
    }
    public function deleteBottle($book, $bottle)
    {
        // Encuentra el registro que cumple con las condiciones
        $record = DB::table('book_bottle')
            ->where('book_id', $book)
            ->where('bottle_id', $bottle)
            ->first();

        if ($record) {
            $reserva = DB::table('books')->where('id', $book)->first();

            if ($reserva->type == 'vip') {


                // Verificar el tipo de mesa
                $table = DB::table('tables')->where('id', $reserva->table_id)->value('type');

                // Verificar el mínimo de botellas
                $min = DB::table('events')->where('id', $reserva->event_id)->value('min_vip_' . $table);

                // Contar las botellas
                $count = DB::table('book_bottle')->where('book_id', $book)->count();
                if ($count <= $min) {
                    toastr('El mínimo de botellas para esta reserva es: ' . $min, 'error');
                    return back();
                }
            }

            // Elimina el primer registro que se encontró
            DB::table('book_bottle')->where('id', $record->id)->delete();
            toastr('Botella eliminada', 'success');

        } else {
            toastr('Ha ocurrido un error al intentar eliminar la botella', 'error');
        }
        return redirect()->back();
    }
}
