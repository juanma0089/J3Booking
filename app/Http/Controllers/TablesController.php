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
                return $this->getAllTables($request->input('idevent'));
            default:
                return view('oldindex');
        }
    }

    public function getAllTables($idevent)
    {

        $tables = DB::table('tables')
            ->leftJoin('books', function ($join) use ($idevent) {
                $join->on('tables.id', '=', 'books.table_id')
                    ->where('books.event_id', '=', $idevent)
                    ->where('books.status','!=','cancelled');
            })
            ->select('tables.*', 'books.id as idbook', 'books.status as statusbook')
            ->orderBy('tables.id', 'asc')
            ->orderBy('tables.type', 'asc')
            ->get();

        return response()->json($tables);
    }
}
