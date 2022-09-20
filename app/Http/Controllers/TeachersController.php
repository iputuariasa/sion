<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(request('search'));
        return view('admins.teachers.index',[
            'title' => 'Data Guru',
            'teachers' => Teacher::latest()->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.teachers.create',[
            'title' => 'Tambah Data Guru'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'nip' => ['required'],
            'nama' => ['required'],
        ]);

        $validatedData = new Teacher;
        $validatedData->nama = $request['nama'];
        $validatedData->nip = $request['nip'];
        $validatedData->slug = preg_replace("/[^a-zA-Z0-9]/", "", bcrypt($request->nama));
        $validatedData->save();

        $validatedDataUser = $request->validate([
            'nip' => ['required'],
            'nama' => ['required'],
            'role' => ['required'],
        ]);

        $validatedDataUser = new User;
        $validatedDataUser->teacher_id = $validatedData->id;
        $validatedDataUser->nama = $request['nama'];
        $validatedDataUser->kode_login = $request['nip'];
        $validatedDataUser->password = bcrypt($request['nip']);
        $validatedDataUser->slug = preg_replace("/[^a-zA-Z0-9]/", "", bcrypt($request->nama));
        $validatedDataUser->role = $request->role;
        $validatedDataUser->save();

        return redirect('/teachers')->with('success', 'Guru Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        // dd($teacher->mclass);
        return view('admins.teachers.show',[
            'title' => 'Data Saya',
            'teacher' => $teacher
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('admins.teachers.edit',[
            'title' => 'Ubah Data',
            'teacher' => $teacher
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        // dd($request);
        // return $request->file('foto')->store('user-image');
        if($request->newpassword){

            if($request->newpassword == $request->corfimpassword){
                $request->validate([
                    'newpassword' => 'required',
                    'corfimpassword' => 'required',
                ]);
    
                User::where('id', $teacher->user->id)->update([
                    'password' => Hash::make($request->newpassword)
                ]);

                return back()->with('success', 'Password Guru Berhasil Diubah!');
            }
            else{
                return back()->with('errorPassword', 'Password Konfirmasi Tidak Sama!');
            }
        }

        $validatedData = $request->validate([
            'nip' => ['required'],
            'nama' => ['required'],
            'email' => ['required'],
            'telepon' => ['required'],
            'agama' => ['required'],
            'jk' => ['required'],
            'jabatan' => ['required'],
            'alamat' => ['required']
        ]);

        
        Teacher::where('id', $teacher->id)
        ->update($validatedData);
        
        $validatedDataUser = $request->validate([
            'nama' => ['required'],
            'foto' => 'image|file|max:1024',
        ]);

        if($request->file('foto')){
            if($request->oldFoto != 'user-image/user.png'){
                Storage::delete($request->oldFoto);
            }
            $validatedDataUser['foto'] = $request->file('foto')->store('user-image');
        }
        $validatedDataUser['kode_login'] = $request->nip;

        User::where('id', $teacher->user->id)
                ->update($validatedDataUser);
        
        return back()->with('success', 'Data Guru Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        // dd($teacher->user);
        if($teacher->foto != 'user-image/user.png'){
            Storage::delete($teacher->foto);
        }

        Teacher::destroy($teacher->id);
        
        return redirect('/students')->with('success','Data Guru Berhasil Dihapus!');
    }
}
