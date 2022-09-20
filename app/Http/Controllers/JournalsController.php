<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Schedule;
use App\Models\schoolYear;
use App\Models\Semester;
use Illuminate\Http\Request;

class JournalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teachers.myworks.journals.index',[
            'title' => 'Data Jurnal',
            // 'schedules' => Schedule::where('teacher_id', auth()->user()->teacher->id)->where('schoolYear_id', schoolYear::where('status', 'aktif')->first()->id)->where('semester_id', Semester::where('status', 'aktif')->first()->id)->get(),

            $schedule = Schedule::where('schoolYear_id', schoolYear::where('status', 'aktif')->first()->id)->where('semester_id', Semester::where('status', 'aktif')->first()->id)->get(),

            'schedules' => $schedule,
            // 'journals' => Journal::orderBy('tanggal', 'desc')->where('schedule_id', $schedule->id)->get(),
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
            'kode_jurnal' => ['required'],
            'schedule_id' => ['required', 'numeric'],
            'teacher_id' => ['required', 'numeric'],
            'materi' => ['required'],
            'ket' => [''],
            'pertemuan_ke' => ['required', 'numeric'],
            'tanggal' => ['required'],
        ]);

        Journal::create($validatedData);

        return redirect('/myworks/journals')->with('success', 'Jurnal Berhasil Diinputkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function show(Journal $journal)
    {
        return view('teachers.myworks.journals.show',[
            'title' => 'Detail Journal '.$journal->kode_jurnal,
            'journal' => $journal,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function edit(Journal $journal)
    {
        return view('teachers.myworks.journals.edit',[
            'title' => 'Ubah Journal '.$journal->kode_jurnal,
            'journal' => $journal,
            'schedules' => Schedule::where('teacher_id', auth()->user()->teacher->id)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Journal $journal)
    {
        // dd($request);
        $validatedData = $request->validate([
            'tanggal' => ['required'],
            'schedule_id' => ['required', 'numeric'],
            'pertemuan_ke' => ['required', 'numeric'],
            'materi' => ['required'],
            'ket' => [''],
        ]);

        Journal::where('id', $journal->id)
                ->update($validatedData);
        
        return redirect('/myworks/journals')->with('success', 'Jurnal Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Journal $journal)
    {
        Journal::destroy($journal->id);

        return redirect('/myworks/journals')->with('cancelled', 'Jurnal Berhasil Dibatalkan');
    }
}
