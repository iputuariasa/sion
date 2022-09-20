<?php

namespace App\Http\Controllers;

use App\Models\schoolYear;
use Illuminate\Http\Request;

class SchoolYearsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.data_umum.schoolYear.index',[
            'title' => 'Tahun Pelajaran',
            'schoolYears' => schoolYear::all(),
            'confirmAktif' => schoolYear::where('status', 'Aktif')->get(),
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
            'tahun_pelajaran' => ['required'],
            'status' => ['required'],
        ]);

        schoolYear::create($validatedData);

        return redirect('/data_umum/school_years')->with('success','Tahun Pelajaran Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\schoolYear  $schoolYear
     * @return \Illuminate\Http\Response
     */
    public function show(schoolYear $schoolYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\schoolYear  $schoolYear
     * @return \Illuminate\Http\Response
     */
    public function edit(schoolYear $schoolYear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\schoolYear  $schoolYear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, schoolYear $schoolYear)
    {
        // dd($request);
        if(!$request['status']){
            $validatedData = $request->validate([
                'tahun_pelajaran' => ['required']
            ]);

            schoolYear::where('id', $schoolYear->id)
                        ->update($validatedData);
            
            return redirect('/data_umum/school_years')->with('success','Tahun Pelajaran Berhasil Diubah!');
        }
        elseif($request['status'] == 'Nonaktif'){
            $validatedData = $request->validate([
                'tahun_pelajaran' => ['required'],
                'status' => ['required']
            ]);

            schoolYear::where('id', $schoolYear->id)
                    ->update($validatedData);
                    
            return redirect('/data_umum/school_years')->with('success','Tahun Pelajaran Berhasil Dinonaktifkan!');
        }
        elseif($request['status'] == 'Aktif'){
            if ($request['confirmAktif'] >= 1) {
                return redirect('/data_umum/school_years')->with('error','Tahun Pelajaran Hanya Boleh Aktif Satu!');
            } 
            else {
                $validatedData = $request->validate([
                    'tahun_pelajaran' => ['required'],
                    'status' => ['required']
                ]);
    
                schoolYear::where('id', $schoolYear->id)
                        ->update($validatedData);
                        
                return redirect('/data_umum/school_years')->with('success','Tahun Pelajaran Berhasil Diaktifkan!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\schoolYear  $schoolYear
     * @return \Illuminate\Http\Response
     */
    public function destroy(schoolYear $schoolYear)
    {
        schoolYear::destroy($schoolYear->id);

        return redirect('/data_umum/school_years')->with('success','Tahun Pelajaran Berhasil Dihapus!');
    }
}
