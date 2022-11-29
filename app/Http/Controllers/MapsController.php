<?php

namespace App\Http\Controllers;

use App\Models\Maps;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MapsController extends Controller
{
    public function getAllStoreData(){
        $data = Maps::all();

        // return response()->json(['message' => 'Success Get All Data', 'data' => $data]);
        return view('index', ['data' => $data]);
    }
    //
    public function storeData()
    {
        // $validator = Validator::make(request()->all(), [
        //     'title' => 'required',
        //     // 'category_name' => 'required',
        //     // 'address' => 'required',
        //     // 'street' => 'required',
        //     // 'city' => 'required',
        //     // 'state' => 'required',
        //     // 'lat'=>'required',
        //     // 'long' => 'required',
        //     // 'url' => 'required',
        // ]);

        // if($validator->fails()){
        //     return response()->json($validator->messages());
        // }

        $data = Maps::create([
            'title' => request('title'),
            'category_name' => request('category_name'),
            'address' => request('address'),
            'street' => request('street'),
            'city' => request('city'),
            'state' => request('state'),
            'lat' => request('lat'),
            'long' => request('long'),
            'url' => request('url'),
        ]);

        
        if($data){
            return response()->json(['message' => 'insert data successfully', 'data' => $data]);
        }else{
            return response()->json(['message' => 'Registration Failed']);
        }
    }
}
