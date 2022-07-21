<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Alert;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $user = Auth::user();

        if (Auth::user()->hasRole(['supadm','adm'])) {
            # code...
            return view('SupAdm.profile', compact('user'));
        
        } elseif (Auth::user()->hasRole(['user','voter','aspirant'])) {
            return view('user.profile',compact('user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
        $user = Auth::user();

        if (Auth::user()->hasRole(['supadm','adm'])) {
            # code...
            return view('SupAdm.createProfile', compact('user'));
        
        } elseif (Auth::user()->hasRole(['user','voter','aspirant'])) {
            return view('User.createProfile', compact('user'));
       
        }
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
        $request->validate([

            // 'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', Rule::unique('profiles')->ignore($user->id)],

            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:10'],

            'gender' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'bio' => 'required',
            'user_id' => 'required',
            'profile' => 'mimes:jpg,jpeg,png,pdf|max:5048'

        ]);

        if ($request->hasFile('profile')) {

            $featured = $request->profile;
            $featured_new_name = time() . '-' . $featured->getClientOriginalName();
            $featured->move('images/profile', $featured_new_name);

            Profile::create([
                'user_id' => $request->input('user_id'),
                'phone' => $request->input('phone'),
                'gender' => $request->input('gender'),
                'bio' => $request->input('bio'),
                'address' => $request->input('address'),
                'dob' => $request->input('dob'),
                'profile' => $featured_new_name
            ]);
        } else {
            # code...
            Profile::create([
                'user_id' => $request->input('user_id'),
                'phone' => $request->input('phone'),
                'gender' => $request->input('gender'),
                'bio' => $request->input('bio'),
                'address' => $request->input('address'),
                'dob' => $request->input('dob'),

            ]);
        }
        return redirect()->route('dashboard')->with('status', 'Your Profile Has Been Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
        $user = Auth::user();

        if (Auth::user()->hasRole(['supadm','adm'])) {
            # code...
            return view('SupAdm.updateProfile', compact('user', 'profile'));
        
        } elseif (Auth::user()->hasRole(['user','voter','aspirant'])) {
            return view('User.updateProfile', compact('user', 'profile'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile, $id)
    {
        //

        $profile = Profile::find($id);
        $request->validate([

            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:10', Rule::unique('profiles')->ignore(Auth::user()->profile->id)],
            'gender' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'bio' => 'required',
            'profile' => 'mimes:jpg,jpeg,png,pdf|max:5048'

        ]);

        if ($request->hasFile('profile')) {
            # delete file if exists...
            $destination = 'images/profile/' . $profile->profile;
            if (File::exists($destination)) {

                File::delete($destination);
                # code...
            }


            $featured = $request->profile;
            $featured_new_name = time() . '-' . $featured->getClientOriginalName();
            $featured->move('images/profile', $featured_new_name);

            $profile->update([
                'user_id' => $request->user_id,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'phone' => $request->phone,
                'address' => $request->address,
                'bio' => $request->bio,
                'profile' => $featured_new_name
            ]);
        } else {
            # code...
            $profile->update($request->all());
        }
        Alert::info('SUCCESS', 'Your BIO INformation is updated');
        return redirect()->route('dashboard')->with('status', 'Profile Bio Record Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
