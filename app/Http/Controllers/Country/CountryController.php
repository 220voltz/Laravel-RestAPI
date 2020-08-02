<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CountryModel;
use Validator;

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
            return response()->json(["message" => "Record not found!"],404);
        }
        return response()->json($country,200);
        
    }
    
    // CREATE
    public function countrySave(Request $request){
        $rules = [
            'name' => 'required|min:3',
            'iso' => 'required|min:2|max:2|unique'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $country = CountryModel::create($request->all());
        return response()->json($country, 201);
    }

    // UPDATE
    public function countryUpdate(Request $request, $id){
        $country = CountryModel::find($id);
        if(is_null($country)){
            return response()->json(["message" => "Record not found!"],404);
        }
        $country->update($request->all());
        return response()->json($country,200);
    }

    // DELETE
    public function countryDelete(Request $request, $id){
        $country = CountryModel::delete($id);
        if(is_null($country)){
            return response()->json(["message" => "Record not found!"],404);
        }
        $country->delete();
        return response()->json(null,204);
    }
}
