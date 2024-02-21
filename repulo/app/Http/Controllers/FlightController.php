<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlightController extends Controller
{
    public function index(){
        return Flight::all();
    }

    public function show($id){
        $flight = response()->json(Flight::find($id));
        return $flight;
    }

    public function store(Request $request){
        $flight = new Flight();
        $flight->name = $request->name;
        $flight->country = $request->country;
        $flight->save();
    }

    public function update(Request $request, $id){
        $flight = Flight::find($id);
        $flight->name = $request->name;
        $flight->country = $request->country;
        $flight->save();
    }

    public function destroy($id){
        Flight::find($id)->delete();
    }
}
