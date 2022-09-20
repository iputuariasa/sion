<?php

namespace App\Http\Controllers;

use App\Models\Study;
use Illuminate\Http\Request;

class StudiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.data_umum.study.index',[
            'title' => 'Mata Pelajaran',
            'studies' => Study::all()
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
            'kode_mapel' => ['required'],
            'mapel' => ['required'],
        ]);

        Study::create($validatedData);

        return redirect('/data_umum/studies')->with('success','Mata Pelajaran Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function show(Study $study)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function edit(Study $study)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Study $study)
    {
        // dd($request);
        $validatedData = $request->validate([
            'mapel' => ['required'],
        ]);

        Study::where('id', $study->id)
                ->update($validatedData);

        return redirect('/data_umum/studies')->with('success','Mata Pelajaran Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function destroy(Study $study)
    {
        Study::destroy($study->id);

        return redirect('/data_umum/studies')->with('success','Mata Pelajaran Berhasil Dihapus!');
    }
}
