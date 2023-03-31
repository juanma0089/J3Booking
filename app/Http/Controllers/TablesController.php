<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TablesController extends Controller
{
    public function createTable()
    {
        // $num_table = DB::table('tables')->count();
        // $table_x_row = 6;
        // // ceil es una función que redondea hacia arriba un número decimal a su entero más cercano.
        // $num_rows = ceil($num_table / $table_x_row);
        // $table_last_row = $num_table % $table_x_row;

        // $table_generate = [];

        // for ($i = 0; $i < $num_rows; $i++) {
        //     $num_table_row = $table_x_row;
        //     if ($i == $num_rows - 1 && $table_last_row > 0) {
        //         $num_table_row = $table_last_row;
        //     }
        //     $table_row = [];
        //     for ($j = 0; $j < $num_table_row; $j++) {
        //         $table = DB::table('tables')->skip($i * $table_x_row + $j)->first();

        //         $table_row = $table;
        //     }
        //     $table_generate = $table_row;


        // }
        $prueba = 2;
        return view('index', @compact(' prueba'));
    }
}
