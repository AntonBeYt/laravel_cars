<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarAddController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $car = new Car();
        $car->make = $request->get('make');
        $car->model = $request->get('model');
        $car->reg_nr = $request->get('reg_nr');
        $car->owner = $request->get('owner');
        $car->fine = $request->get('fine');
        $car->user_id = $request->get('user_id');
        $car->save();
        return back();
        //
    }
}
