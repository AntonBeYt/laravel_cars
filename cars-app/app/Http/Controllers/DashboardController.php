<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $employees = DB::table('users')->get();
        $user = $request->user();
        $cars = DB::table('cars')->get();
        return view('dashboard', ['employees' => $employees, 'user' => $user, 'cars' => $cars]);
    }
}
