<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function profile(){
        return view('site.profile.profile');
    }

    public function profileUpdate(Request $request){
        $dataForm = $request->all();

        if($dataForm['password'] != null){
            $dataForm['password'] = bcrypt($dataForm['password']);
        }else{
            unset($dataForm['password']);
        }

        if(auth()->user()->update($dataForm)){
            return redirect()->route('profile')->with('success', 'Sucesso ao Atualizar');
        }else{
            return redirect()->back()->with('error', 'Falha ao Atualizar');
        }
    }
}
