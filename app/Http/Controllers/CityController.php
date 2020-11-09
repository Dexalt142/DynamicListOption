<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    
    public function getCities($id) {
        $cities = City::where('province_id', $id)->get(['id', 'city_name']);

        return response()->json([
            'cities' => $cities
        ]);
    }

}
