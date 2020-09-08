<?php

namespace App\Http\Controllers;

use App\announcement;
use App\ancmtImages;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request){
        $ancts = announcement::where('published',1)->orderBy('created_at', 'desc')->paginate(3);
        $ancts_images =  ancmtImages::all();

        if ($request->filled('tab')) {
            $ancts = announcement::where('estate_desc',$request->tab)->paginate(8);
        }
        if ($request->filled('address')){
            $ancts = announcement::where('location', 'LIKE', $request->address)
                ->orWhere('address', 'LIKE', $request->address)
                ->orWhere('cascade_code', 'LIKE', $request->address)
                ->orWhere('desc_arm', 'LIKE', $request->address)
                ->orWhere('desc_eng', 'LIKE', $request->address)
                ->orWhere('desc_rus', 'LIKE', $request->address)
                ->paginate(8);
        }
        if ($request->filled('estate_type')){
                $ancts = announcement::where('estate_type',"=",$request->estate_type)->paginate(8);
        }
        if ($request->filled('min_price')) {
            $ancts = announcement::where('price', ">=", $request->min_price)->paginate(8);
        }
        if ($request->filled('max_price')) {
            $ancts = announcement::where('price', "<=", $request->max_price)->paginate(8);
        }
        if ($request->filled('typeofbld')) {
            $ancts = announcement::where('typeofbld', "=", $request->typeofbld)->paginate(8);
        }
        if ($request->filled('currency')) {
            $ancts = announcement::where('currency', "=", $request->currency)->paginate(8);
        }
        if ($request->filled('minsquare_meter')) {
            $ancts = announcement::where('square_meter', ">=", $request->minsquare_meter)->paginate(8);
        }
        if ($request->filled('maxsquare_meter')) {
            $ancts = announcement::where('square_meter', "<=", $request->maxsquare_meter)->paginate(8);
        }
        if ($request->filled('min_rooms')) {
            $ancts = announcement::where('rooms', "<=", $request->min_rooms)->paginate(8);
        }
        if ($request->filled('max_rooms')) {
            $ancts = announcement::where('rooms', ">=", $request->max_rooms)->paginate(8);
        }
        if ($request->filled('new_building')) {
            $ancts = announcement::where('new_building',1)->paginate(8);
        }
        return view('main',compact('ancts','ancts_images'));
    }
}
