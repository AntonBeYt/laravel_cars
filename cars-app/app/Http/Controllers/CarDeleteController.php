<?php

namespace App\Http\Controllers;

use App\Models\Car;

class CarDeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Car $car)
    {
        $car->delete();
        return back();
        //
    }
}
