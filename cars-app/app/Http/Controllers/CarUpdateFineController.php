<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarUpdateFineController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $id)
    {
        $car = Car::find($id);
        $car->fine = $request->input('newFine');
        $car->save();
        return back();
        //
    }
}
