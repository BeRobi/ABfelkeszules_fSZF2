<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TravelController extends Controller
{
    public function index(){
        return Travel::all();
    }

    public function show($id){
        $travel = response()->json(Travel::find($id));
        return $travel;
    }

    public function store(Request $request){
        $travel = new Travel();
        $travel->name = $request->name;
        $travel->country = $request->country;
        $travel->save();
    }

    public function update(Request $request, $id){
        $travel = Travel::find($id);
        $travel->name = $request->name;
        $travel->country = $request->country;
        $travel->save();
    }

    public function destroy($id){
        Travel::find($id)->delete();
    }

    
    public function osszesJarat($id)
    {
        return DB::table('travel as t')
        ->selectRaw('f.flight_id, travel_id, user_id, date')
        ->join('flights as f','f.flight_id','t.flight_id')
        ->where('f.flight_id', $id) 
        ->get();
    }

    public function sajatJarat(){
        $user = Auth::user();	//bejelentkezett felhasználó
        $travel = Travel::with('user')->where('user_id','=',$user->id)->get();
        return $travel;
    }





}
