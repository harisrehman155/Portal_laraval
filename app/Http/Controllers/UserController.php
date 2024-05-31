<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{


    public function show()
    {
        return view(ADMIN_RESOURCE . 'auth.login');
    }

    public function showRegister()
    {
        return view(ADMIN_RESOURCE . 'auth.register');
    }

    public function profile()
    {
        return view(ADMIN_RESOURCE . 'profile');
    }


    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'company' => 'sometimes|nullable|string',
            'company_type' => 'sometimes|nullable|string',
            'phone_number' => 'sometimes|nullable|numeric',
            'address' => 'sometimes|nullable|string',
            'fax_number' => 'sometimes|nullable|string',
            'city' => 'sometimes|nullable|string',
            'country' => 'sometimes|nullable|string',
            'cell_number' => 'sometimes|nullable|numeric',
        ]);
        $request->merge(['password' => Hash::make($request->password)]);
        $user = User::create($request->all());

        if ($user) {
            return redirect('/login');
        } else {

            return redirect()->back()->with('error', trans('auth.failed'));
        }
    }


    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function update(Request $request)
    {


        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(auth()->user()->id),
            ],
            'password' => 'sometimes|nullable|confirmed|min:8',
            'company' => 'sometimes|nullable|string',
            'company_type' => 'sometimes|nullable|string',
            'phone_number' => 'sometimes|nullable|numeric',
            'address' => 'sometimes|nullable|string',
            'fax_number' => 'sometimes|nullable|string',
            'city' => 'sometimes|nullable|string',
            'country' => 'sometimes|nullable|string',
            'cell_number' => 'sometimes|nullable|numeric',
        ]);
        // dd($request->hasFile('image'));
        if ($request->hasFile('image')) {

            $profile = $request->file('image');
            Auth::user()->image = $profile->storeAs('users/', 'profile-' . Auth::user()->id . '.' . $profile->getClientOriginalExtension(), 'public');
        }
        if ($request->password) {
            Auth::user()->password = Hash::make($request->password);
        }
        Auth::user()->name = $request->name;
        Auth::user()->email = $request->email;
        Auth::user()->company = $request->company;
        Auth::user()->company_type = $request->company_type;
        Auth::user()->phone_number = $request->phone_number;
        Auth::user()->fax_number = $request->fax_number;
        Auth::user()->fax_number = $request->fax_number;
        Auth::user()->city = $request->city;
        Auth::user()->country = $request->country;
        Auth::user()->address = $request->address;
        Auth::user()->cell_number = $request->cell_number;
        Auth::user()->updated_at = Carbon::now();

        if (Auth::user()->save()) {
            return back()->with('success', 'Profile Updated Successfully');
        } else {
            return back()->with('error', '!Oops something went wrong please try again.');
        }
    }


    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        } else {

            return redirect()->back()->with('error', trans('auth.failed'));
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        // $request->session()->flush();
        // $request->session()->regenerate();

        return redirect('/login');
    }
}
