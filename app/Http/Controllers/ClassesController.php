<?php

namespace App\Http\Controllers;

use App\Models\Mclass;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->Mclass = new Mclass();
    }

    public function index()
    {
        return view('admins.data_umum.class.index',[
            'title' => 'Data Kelas',
            'classes' => Mclass::latest()->get(),
            // 'classes' => $this->Mclass->dataClass(),
            'teachers' => Teacher::all()
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
        $validatedData = $request->validate([
            'kode_kelas' => ['required', 'unique:mclasses'],
            'nama_kelas' => ['required'],
            'teacher_id' => ['required','numeric']
        ]);

        Mclass::create($validatedData);

        return redirect('/data_umum/mclasses')->with('success','Kelas Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mclass  $mclass
     * @return \Illuminate\Http\Response
     */
    public function show(Mclass $mclass)
    {
        // dd($mclass->schedule);
        return view('admins.data_umum.class.show',[
            'title' => 'Data Kelas '.$mclass->nama_kelas,
            'class' => $mclass->student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mclass  $mclass
     * @return \Illuminate\Http\Response
     */
    public function edit(Mclass $mclass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mclass  $mclass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mclass $mclass)
    {
        // dd($request);
        $validatedData = $request->validate([
            'nama_kelas' => ['required'],
            'teacher_id' => ['required','numeric']
        ]);

        Mclass::where('id', $mclass->id)
                ->update($validatedData);
        
        return redirect('/data_umum/mclasses')->with('success','Kelas Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mclass  $mclass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mclass $mclass)
    {
        // dd($mClass);
        Mclass::destroy($mclass->id);

        return redirect('/data_umum/mclasses')->with('success','Kelas Berhasil DiHapus!');
    }

    public function jadwal(Mclass $mClass){
        dd($mClass);
    }
}
