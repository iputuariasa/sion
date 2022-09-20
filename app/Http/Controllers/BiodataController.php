<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    public function index()
    {
        return view('general.biodata.index',[
            'title' => 'Biodata'
        ]);
    }

    public function updateAdmin(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'nip' => ['required','numeric'],
            'nama' => ['required'],
            'email' => ['required','email:dns'],
            'jk' => ['required'],
            'telepon' => ['required'],
            'jabatan' => ['required'],
            'agama' => ['required'],
            'alamat' => ['required'],
        ]);
        
        Admin::where('id', $request->id)
                ->update($validatedData);

        $validatedDataUser = $request->validate([
            'foto' => 'image|file|max:1024',
            'nama' => ['required'],
        ]);
        $validatedDataUser['kode_login'] = $request->nip;
        if($request->oldFoto){
            if($request->oldFoto == 'user-image/user.png'){
                $validatedDataUser['foto'] = $request->file('foto')->store('user-image');
            }
            elseif($request->oldFoto != 'user-image/user.png'){
                Storage::delete($request->oldFoto);
                $validatedDataUser['foto'] = $request->file('foto')->store('user-image');
            }
        }
        User::where('id', $request->user_id)
                ->update($validatedDataUser);
        
        return back()->with("success", "Biodata Berhasil Diubah!");
    }

    public function updateTeacher(Request $request){
        // dd($request);
        $validatedData = $request->validate([
            'nip' => ['required','numeric'],
            'nama' => ['required'],
            'email' => ['required'],
            'jk' => ['required'],
            'telepon' => ['required'],
            'jabatan' => ['required'],
            'agama' => ['required'],
            'alamat' => ['required'],
        ]);
        
        Teacher::where('id', $request->id)
                ->update($validatedData);

        $validatedDataUser = $request->validate([
            'foto' => 'image|file|max:1024',
            'nama' => ['required'],
        ]);
        $validatedDataUser['kode_login'] = $request->nip;

        if($request->oldFoto){
            if($request->oldFoto == 'user-image/user.png'){
                $validatedDataUser['foto'] = $request->file('foto')->store('user-image');
            }
            elseif($request->oldFoto != 'user-image/user.png'){
                Storage::delete($request->oldFoto);
                $validatedDataUser['foto'] = $request->file('foto')->store('user-image');
            }
        }
        User::where('id', $request->user_id)
                ->update($validatedDataUser);
        
        return back()->with("success", "Biodata Berhasil Diubah!");
    }
} 
