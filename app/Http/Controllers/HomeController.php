<?php

namespace App\Http\Controllers;

use App\Models\Car;

class HomeController extends Controller
{
    public function homePage()
    {
        $cars = Car::orderBy('created_at', 'desc')
            ->paginate(12);

        $carCount = Car::all()->count();

        return view('home', compact('cars', 'carCount'));
    }
}
