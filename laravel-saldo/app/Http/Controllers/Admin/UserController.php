<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileFormRequest;

class UserController extends Controller
{
    public function profile(){
        return view('site.profile.profile');
    }

    public function profileUpdate(UpdateProfileFormRequest $request){
        $user = auth()->user();

        $dataForm = $request->all();

        if($dataForm['password'] != null){
            $dataForm['password'] = bcrypt($dataForm['password']);
        }else{
            unset($dataForm['password']);
        }

        $dataForm['image'] = $user->image;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            if($user->image)
                $name = $user->image;
            else
                $name = $user->id.kebab_case($user->name);

            $extension = $request->file('image')->extension();
            
            $nameFile = "{$name}.{$extension}";
            $upload = $request->file('image')->storeAs('users', $nameFile);

            if(!$upload){
                return redirect()->back()->with('error', 'Falha ao fazer o upload da imagem');
            }else{
                $dataForm['image'] = $nameFile;
            }           
        }

        if($user->update($dataForm)){
            return redirect()->route('profile')->with('success', 'Sucesso ao Atualizar');
        }else{
            return redirect()->back()->with('error', 'Falha ao Atualizar');
        }
    }
}
