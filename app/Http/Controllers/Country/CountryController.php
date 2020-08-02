<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CountryModel;

class CountryController extends Controller
{
    //READ ALL
    public function country(){
        return response()->json(CountryModel::get(),200);
    }
    
    //READ SINGLE
    public function countryByID($id){
        $country = CountryModel::find($id);
        if(is_null($country)){
            return response()->json('Record Not Found!',404);
        }
        return response()->json($country,200);
    
    }

    // CREATE
    public function countrySave(Request $request){
        $country = CountryModel::create($request->all());
        return response()->json($country, 201);
    }

    // UPDATE
    public function countryUpdate(Request $request, $id){
        $country = CountryModel::find($id);
        $country->update($request->all());
        return response()->json($country,200);
    }

    // DELETE
    public function countryDelete(Request $request, CountryModel $country){
        $country->delete();
        return response()->json(null,204);
    }
}
