<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
{
    public function index() {
        $rates = DB::table('rate')->paginate(10);
        return view('index', ['rates' => $rates]);
    }
}