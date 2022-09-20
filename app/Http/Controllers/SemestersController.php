<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemestersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.data_umum.semester.index',[
            'title' => 'Data Kelas',
            'semesters' => Semester::all(),
            'confirmAktif' => Semester::where('status', 'Aktif')->get(),
            // 'semesterNon' => Semester::where('status', 'Nonaktif')->get()
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
            'semester' => ['required'],
            'status' => ['required'],
        ]);

        Semester::create($validatedData);

        return redirect('/data_umum/semesters')->with('success','Semester Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function edit(Semester $semester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semester $semester)
    {
        // dd($request);
        if(!$request['status']){
            $validatedData = $request->validate([
                'semester' => ['required']
            ]);

            Semester::where('id', $semester->id)
                        ->update($validatedData);
            
            return redirect('/data_umum/semesters')->with('success','Semester Berhasil Diubah!');
        }
        elseif($request['status'] == 'Nonaktif'){
            $validatedData = $request->validate([
                'semester' => ['required'],
                'status' => ['required']
            ]);

            Semester::where('id', $semester->id)
                    ->update($validatedData);
                    
            return redirect('/data_umum/semesters')->with('success','Semester Berhasil Dinonaktifkan!');
        }
        elseif($request['status'] == 'Aktif'){
            if ($request['confirmAktif'] >= 1) {
                return redirect('/data_umum/semesters')->with('error','Semester Aktif Hanya Satu!');
            } 
            else {
                $validatedData = $request->validate([
                    'semester' => ['required'],
                    'status' => ['required']
                ]);
    
                Semester::where('id', $semester->id)
                        ->update($validatedData);
                        
                return redirect('/data_umum/semesters')->with('success','Semester Berhasil Diaktifkan!');
            }
        }










        // if($request['semesterAktif'] > 1){
        //     return redirect('/data_umum/semesters')->with('error','Semester Hanya Boleh Aktif Satu!');
        // }
        // elseif($request['semesterNon'] > 1){
        //     return redirect('/data_umum/semesters')->with('error','Semester Hanya Boleh Aktif Satu!');
        // }
        // else{
        //     if($request['status'] == 'Aktif'){
        //         $validatedData = $request->validate([
        //             'semester' => ['required'],
        //             'status' => ['required']
        //         ]);
    
        //         $validatedData['status'] =  'Nonaktif';
    
        //         Semester::where('id', $semester->id)
        //                 ->update($validatedData);
                        
        //         return redirect('/data_umum/semesters')->with('success','Semester Berhasil Dinonaktifkan!');
        //     }
    
        //     if($request['status'] == 'Nonaktif'){
        //         $validatedData = $request->validate([
        //             'semester' => ['required'],
        //             'status' => ['required']
        //         ]);
    
        //         $validatedData['status'] =  'Aktif';
    
        //         Semester::where('id', $semester->id)
        //                 ->update($validatedData);
                        
        //         return redirect('/data_umum/semesters')->with('success','Semester Berhasil Diaktifkan!');
        //     }
        //     else{
        //         $validatedData = $request->validate([
        //             'semester' => ['required']
        //         ]);
    
        //         Semester::where('id', $semester->id)
        //                     ->update($validatedData);
                
        //         return redirect('/data_umum/semesters')->with('success','Semester Berhasil Diubah!');
        //     }
        // }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semester $semester)
    {
        Semester::destroy($semester->id);

        return redirect('/data_umum/semesters')->with('success','Semester Berhasil Dihapus!');
    }
}
