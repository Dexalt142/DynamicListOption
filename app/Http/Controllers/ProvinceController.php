<?php

namespace App\Http\Controllers;

use App\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    
    public function showPage() {
        $provinces = Province::all();

        return view('welcome', compact('provinces'));
    }

}
