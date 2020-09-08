<?php

namespace App\Http\Controllers;

use App\announcement;
use App\ancmtImages;

use App\User;
use Illuminate\Http\Request;
//working with storage
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Detail;


class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ancts = announcement::query()->where('published',1)->orderBy('created_at', 'desc')->paginate(8);
        if ($request->filled('estate_desc')){
            $ancts = announcement::where('estate_desc',"=",$request->estate_desc)->paginate(8);
        }
        if ($request->filled('estate_type')){
            $ancts = announcement::where('estate_type',"=",$request->estate_type)->paginate(8);
        }
        if ($request->filled('location')){
            $ancts = announcement::where('location',"=",$request->location)->paginate(8);
        }
        if ($request->filled('rooms')){
            $ancts = announcement::where('rooms',"=",$request->rooms)->paginate(8);
        }

        if ($request->filled('typeofbld')) {
            $ancts = announcement::where('typeofbld', "=", $request->typeofbld)->paginate(8);
        }
        if ($request->filled('minsquare_meter')) {
            $ancts = announcement::where('square_meter', ">=", $request->minsquare_meter)->paginate(8);
        }
        if ($request->filled('maxsquare_meter')) {
            $ancts = announcement::where('square_meter', "<=", $request->maxsquare_meter)->paginate(8);
        }

        if ($request->filled('min_price')) {
            $ancts = announcement::where('price', ">=", $request->min_price)->paginate(8);
        }
        if ($request->filled('max_price')) {
            $ancts = announcement::where('price', "<=", $request->max_price)->paginate(8);
        }
        if ($request->filled('currency')) {
            $ancts = announcement::where('currency', "=", $request->currency)->paginate(8);
        }
        if ($request->filled('new_building')) {
            $ancts = announcement::where('new_building',1)->paginate(8);
        }


            $ancts_images =  ancmtImages::all();

        return view('announcements',compact('ancts','ancts_images'));
    }
    public function  search(Request $request){
        $ancts = announcement::where('location', 'LIKE', $request->search)
            ->orWhere('address', 'LIKE', $request->search)
            ->orWhere('cascade_code', 'LIKE', $request->search)
            ->orWhere('desc_arm', 'LIKE', $request->search)
            ->orWhere('desc_eng', 'LIKE', $request->search)
            ->orWhere('desc_rus', 'LIKE', $request->search)
            ->paginate(8);
        $ancts_images = ancmtImages::all();
        return view('announcements',compact('ancts','ancts_images'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ancmt = new announcement();
        $ancmt->estate_desc = $request->estate_desc;
        $ancmt->estate_type = $request->estate_type;
        $ancmt->location = $request->location;

        $ancmt->address = $request->address;

        $ancmt->building = $request->building;
        $ancmt->apt = $request->apt;
        $ancmt->cascade_code = $request->cascade_code;
        $ancmt->cascade_code2 = $request->cascade_code2;

        $ancmt->price = $request->price;
        $ancmt->price_sqm = $request->price_sqm;
        $ancmt->currency = $request->currency;
        $ancmt->floor = $request->floor;

        $ancmt->storey = $request->storey;
        $ancmt->square_meter = $request->square_meter;
        $ancmt->land_area = $request->land_area;
        $ancmt->position = $request->position;
        $ancmt->Significance = $request->Significance;

        $ancmt->rooms = $request->rooms;
        $ancmt->toilets = $request->toilets;
        $ancmt->typeofbld = $request->typeofbld;
        $ancmt->new_building = $request->new_building;

        $ancmt->celling_height = $request->celling_height;
        $ancmt->condition = $request->condition;
        $ancmt->comunal = json_encode($request->input('comunal'));
        $ancmt->additional = json_encode($request->input('additional'));


        $ancmt->videourl = $request->videourl;
        $ancmt->map = $request->map;
        $ancmt->desc_arm = $request->desc_arm;
        $ancmt->desc_eng = $request->desc_eng;
        $ancmt->desc_rus = $request->desc_rus;
        $ancmt->other = $request->other;
        $ancmt->published = $request->published;
        $ancmt->ready_prt = $request->ready_prt;
        $ancmt->agent = $request->agent;
        $ancmt->save();

        foreach($request->file('images') as $image)
        {
            $name=$image->getClientOriginalName();
            $image->move(public_path().'/uploads/announcement/'.$ancmt->id, $name);
            ancmtImages::create([
                'ancmt_id' => $ancmt->id,
                'filename'=>$name
            ]);

        }


        return redirect('/announcement');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

            $anct = announcement::findOrFail($id);
            $ancts_images =  ancmtImages::all();
            $User = User::findOrFail($anct->agent);
            return view('announcement.show',compact('anct','ancts_images','User'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announcement = announcement::findOrfail($id);
        return view();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcement = announcement::find($id);


        $folder_path = '/uploads/announcement/'.$announcement->id;

        $files = glob($folder_path.'/*');

        // Deleting all the files in the list
        foreach($files as $file) {

            if(is_file($file))

                // Delete the given file
                unlink($file);
        }
        rmdir('/uploads/announcement/'.$announcement->id);

        $announcement->delete();


        return redirect('/home')->with('success', 'Announcement deleted!');
    }

    public function hide($id){
        $announcement = announcement::find($id);

        $announcement->published = 0;
        $announcement->save();
        return redirect()->back();

    }
    public function publish($id){
        $announcement = announcement::find($id);

        $announcement->published = 1;
        $announcement->save();
        return redirect()->back();

    }
}
