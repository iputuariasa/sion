<?php

namespace App\Http\Controllers;

use App\Models\Mclass;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.students.index',[
            'title' => 'Data Siswa',
            'students' => Student::latest()->filter(request(['search']))->paginate(10)->withQueryString(),
            'classes' => Mclass::all()
        ]);
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
        // dd($request);
        $validatedDataStudent = $request->validate([
            'nis' => ['required'],
            'nama' => ['required'],
            'class_id' => ['required', 'numeric'],
            'tahun_angkatan' => ['required'],
        ]);

        $validatedDataStudent = new Student;
        $validatedDataStudent->nis = $request->nis;
        $validatedDataStudent->nama = $request->nama;
        $validatedDataStudent->mclass_id = $request->class_id;
        $validatedDataStudent->slug = preg_replace("/[^a-zA-Z0-9]/", "", bcrypt($request->nama));
        $validatedDataStudent->tahun_angkatan = $request->tahun_angkatan;
        $validatedDataStudent->save();

        $validatedDataUser = $request->validate([
            'nis' => ['required'],
            'nama' => ['required'],
            'role' => ['required'],
        ]);

        $validatedDataUser = new User;
        $validatedDataUser->kode_login = $request->nis;
        $validatedDataUser->student_id = $validatedDataStudent->id;
        $validatedDataUser->password = bcrypt($request->nis);
        $validatedDataUser->slug =  preg_replace("/[^a-zA-Z0-9]/", "", bcrypt($request->nama));
        $validatedDataUser->nama = $request->nama;
        $validatedDataUser->role = $request->role;
        $validatedDataUser->save();

        return redirect('/students')->with('success', 'Siswa Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        // dd($student);
        return view('admins.students.show',[
            'title' => 'Detail Siswa',
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        // dd($student);
        return view('admins.students.edit',[
            'title' => 'Ubah Data',
            'student' => $student,
            'classes' => Mclass::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        // dd($student->user->id);
        if($request->newpassword){

            if($request->newpassword == $request->corfimpassword){
                $request->validate([
                    'newpassword' => 'required',
                    'corfimpassword' => 'required',
                ]);
    
                User::where('id', $student->user->id)->update([
                    'password' => Hash::make($request->newpassword)
                ]);

                return back()->with('success', 'Password Siswa Berhasil Diubah!');
            }
            else{
                return back()->with('errorPassword', 'Password Konfirmasi Tidak Sama!');
            }
        }

        $validatedData = $request->validate([
            'nis' => ['required'],
            'nama' => ['required'],
            'email' => ['required'],
            'telepon' => ['required'],
            'agama' => ['required'],
            'jk' => ['required'],
            'tahun_angkatan' => ['required'],
            'nama_ayah' => ['required'],
            'nama_ibu' => ['required'],
            'tgl_lahir' => ['required'],
            'tempat_lahir' => ['required'],
            'alamat' => ['required'],
            'mclass_id' => ['required', 'numeric'],
        ]);

        
        Student::where('id', $student->id)
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
        $validatedDataUser['kode_login'] = $request->nis;

        User::where('id', $student->user->id)
                ->update($validatedDataUser);
        
        return back()->with('success', 'Data Siswa Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        // dd($student->user);
        if($student->foto != 'user-image/user.png'){
            Storage::delete($student->foto);
        }

        Student::destroy($student->id);
        
        return redirect('/students')->with('success','Data Siswa Berhasil Dihapus!');
    }
}
