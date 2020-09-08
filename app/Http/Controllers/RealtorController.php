<?php

namespace App\Http\Controllers;

use App\announcement;
use App\ancmtImages;
use App\User;

use Illuminate\Http\Request;

//working with storage
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Detail;

class RealtorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('realitor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
                'name'=>'required|max:255',
                'lastname'=>'required|max:255',
                'type'=>'required|max:255',
                'email'=>'required|max:255',
                'password'=>'required|max:255',
                'age'=>'required|max:255',
                'phone_1'=>'required|max:255'
            ]);
        $User = new User();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image');
            $imageName = time() . '.' . $imagePath ->getClientOriginalExtension();

            $imagePath ->move("uploads/realtor/".$request->email.'/', $imageName );
            $User->image = $imageName ;
        };
        $User->name = $request->name;
        $User->lastname = $request->lastname;

        $User->type = $request->type;
        $User->email = $request->email;
        $User->password = Hash::make($request->password);
        $User->age = $request->age;
        $User->experience = $request->experience;
        $User->level = $request->level;
        $User->working_days = $request->working_days;
        $User->phone_1 = $request->phone_1;
        $User->phone_2 = $request->phone_2;
        $User->fb_link = $request->fb_link;
        $User->location = $request->location;
        $User->image = $request->image;
        $User->distributor = $request->distributor;

        $User->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\realtor  $realtor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
           $realitor = User::findOrFail($id);
           return view('realitor.show',compact('realitor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\realtor  $realtor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $realtor = User::findOrFail($id);
        if($realtor->email == Auth::user()->email){
            return  view('realitor.edit',compact('realtor'));
        }
        else{
            return redirect()->back();
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\realtor  $realtor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:255',
            'lastname'=>'required|max:255',
            'type'=>'required|max:255',
            'email'=>'required|max:255',
            'age'=>'required|max:255',
            'phone_1'=>'required|max:255'
        ]);
        $User = User::find($id);

//        if ($request->hasFile('image')) {
//            $image = $request->hasFile('image');
//            $name=$image->getClientOriginalName();
//            $image->move(public_path().'/uploads/realtor/'.$User->email, $name);
//            $User->image = $image->getClientOriginalName();
//        };
        $User->name = $request->name;
        $User->lastname = $request->lastname;

        $User->type = $request->type;
        $User->email = $request->email;
       # $User->password = Hash::make($request->password);
        $User->age = $request->age;
        $User->experience = $request->experience;
        $User->level = $request->level;
        $User->working_days = $request->working_days;
        $User->phone_1 = $request->phone_1;
        $User->phone_2 = $request->phone_2;
        $User->fb_link = $request->fb_link;
        $User->location = $request->location;
        $User->distributor = $request->distributor;

        $User->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\realtor  $realtor
     * @return \Illuminate\Http\Response
     */
    public function destroy(realtor $realtor)
    {
        //
    }

    public function password(){
        return view('realitor/changepassword');
    }
    public function changepassword(Request $request,$id){
        $request->validate([
            'oldpassword'=>'required',
            'newpassword'=>'required',
            'password_confirmation'=>'required'
        ]);
        $User = User::find($id);
        if(Hash::check($request->oldpassword,$User->password)){
                $User->password = Hash::make($request->newpassword);
                $User->save();
                return redirect('/plor');
        }
        else {
            return redirect('')->back()->withErrors('errors', 'Չի կարող գաղտնաբառը լինել նախկինը');
        }

    }
}
