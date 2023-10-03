<?php

namespace App\Http\Controllers;

use App\Models\Bottle;
use Illuminate\Http\Request;

class BottlesController extends Controller
{
    public function getAllBottles() {
       $data = Bottle::all();

       return response()->json($data);
    }
}
