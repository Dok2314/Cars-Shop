<?php

namespace App\Http\Controllers;

use App\Models\Good;

class HomeController extends Controller
{
    public function homePage()
    {
        $goods = Good::orderBy('created_at', 'desc')
            ->paginate(12);

        $goodCount = Good::all()->count();

        return view('home', compact('goods', 'goodCount'));
    }
}
