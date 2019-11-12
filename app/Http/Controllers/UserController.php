<?php

namespace App\Http\Controllers;

use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('pages.useredit', ['user' => $user, 'isEdit' => true]);
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
        $id = Auth::id();
        $this->validator($request->all())->validate();
        $ownership = DB::table('users')->where('id', $id);
        $oldImage = DB::table('users')->where('id', $id)->value('profile_picture');

        if (Input::file('profile_picture')->isValid()) {
            $imagePath = public_path('img/upload/profile/'.$oldImage);
            File::delete($imagePath);
            $fileExtension = Input::file('profile_picture')->getClientOriginalExtension();
            $fileName = time() . uniqid() . "." . $fileExtension;
            $destinationPath = public_path('img/upload/profile/');
            Input::file('profile_picture')->move($destinationPath, $fileName);
        }

        dd(Input::file('profile_picture'));

        // $ownership->update([
        //     'first_name' => $request->first_name,
        //     'last_name' => $request->last_name,
        //     'gender' => $request->gender,
        //     'email' => $request->email,
        //     'phone_number' => $request->phone_number,
        //     'city' => $request->city,
        //     'profile_picture' => $fileName
        // ]);


        // if(!empty($request->password) && Hash::check($request->password, Auth::user()->password)) {
        //     $ownership->update([
        //         'password' => Hash::make($request->new_password)
        //     ]);
        // }

        // Alert::success('Your profile has been updated', 'Update Succeed'); 
        // return redirect('/promote');
    }

    private function validator(array $data) {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone_number' => ['required', 'string', 'max:16'],
            'city' => ['required', 'string', 'max:255'],
            'profile_picture' => ['nullable'],
        ]);
    }
}
