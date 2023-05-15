<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TablesController extends Controller
{
    public function index(Request $request)
    {
        switch ($request->input('action')) {
            case 'get_all_tables':
                return $this->getAllTables($request->input('date'), $request->input('tramo'));
            default:
                return view('index');
        }
    }

    public function getAllTables($date, $tramo)
    {

        $tables = DB::table('tables')
            ->leftJoin('books', function ($join) use ($tramo, $date) {
                $join->on('tables.id', '=', 'books.table_id')
                    ->where('books.date', '=', $date)
                    ->where('books.time', '=', $tramo);
            })
            ->select('tables.*', DB::raw('CASE WHEN books.id IS NULL THEN 0 ELSE 1 END AS has_booking'))
            ->get();

        return response()->json($tables);
    }
}
