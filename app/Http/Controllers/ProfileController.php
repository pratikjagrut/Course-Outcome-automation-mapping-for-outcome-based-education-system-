<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('home')->with('profile', $user->profile);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::find($id);
        return view('edit')->with('profile', $profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
                'pswd' => 'required',
                'profile_pic' => 'image|nullable|max:2000'
            ]);

        $pswd = $request->input('pswd');
        if (Hash::check($pswd, auth()->user()->password)) {
            $profile = Profile::find($id);
            $designation = $request->input('designation');
            $dept = $request->input('dept');
            $college = $request->input('college');
            $contact_number = $request->input('contact_number');
            $add = $request->input('add');

            if($designation != null)
                $profile->designation = $designation;
            if($dept != null)
                $profile->department = $dept;
            if($college != null)
                $profile->college = $college;
            if($contact_number != null)
                $profile->contact_number = $contact_number;
            if($add != null)
                $profile->address = $add;

            //Handle file upload
            if($request->hasFile('profile_pic'))
            {
                //Get file name with extension
                $fileNameWithExt = $request->file('profile_pic')->getClientOriginalName();
                //Get just file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                //Get just extension
                $extension = $request->file('profile_pic')->getClientOriginalExtension();
                //File name to store
                $fileNameToStore = $fileName.'_'.time().'.'.$extension;
                //Upload image
                $path = $request->file('profile_pic')->storeAs('public/profile_pics', $fileNameToStore);

            }
            else
                $fileNameToStore = 'noimage.jpg';

            $profile->profile_pic = $fileNameToStore;
            $profile->save();

            return redirect('/profile/'.$id.'/edit')->with('success', 'Information updated');
        }
        else
            return redirect('/profile/'.$id.'/edit')->with('error', 'Password do not match');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
