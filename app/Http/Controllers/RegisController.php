<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Data_ush;
use App\Models\Data_mitra;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Rules\MixedCase;
use App\Rules\Symbols;
use App\Rules\Number;

class RegisController extends Controller
{
    
    public function index(){
        return view('auth.regis' );
    }

    public function store(Request $request){
    
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'nmush' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => ['required', 
            Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()]
            
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

            $user = new User;
            $user->email    = $validateData['email'];
            $user->password = $validateData['password'];
            $user->save();

            $dataush = new Data_Ush;
            $dataush->user_id  = $user->id;
            $dataush->nama_ush = $validateData['nmush'];
            $dataush->save();

            $datauser = new Data_Mitra;
            $datauser->user_id     = $user->id;
            $datauser->data_ush_id = $dataush->id;
            $datauser->nm          = $validateData['name'];
            $datauser->save();

        $request->session()->flash('success','Registration successfull! Please Login ');

        return redirect('/login')->with('success','Registration successfull! Please Login ');
    }
}
