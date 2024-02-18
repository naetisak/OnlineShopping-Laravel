<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(Request $request){
        if($request->method() == 'POST'){
            $request->validate([
                'first_name' => 'required|max:25',
                'last_name' => 'required|max:25',
                'email' => 'required|email',
                'mobile' => 'required|max:10',
            ]);
            $user = User::find(auth()->user()->id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->save();

            return back()->withSuccess('Update Successfully');
        }
        return view('account');
    }
}
