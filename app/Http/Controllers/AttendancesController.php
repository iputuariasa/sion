<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Journal;
use App\Models\Mclass;
use App\Models\Schedule;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teachers.myworks.attendances.index',[
            'title' => 'Data Absensi',
            'journals' => Journal::orderBy('tanggal', 'desc')->where('teacher_id', auth()->user()->teacher->id)->filter(request(['search']))->paginate(10)->withQueryString(),
            'attendances' => Attendance::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return request('attendance');
        return view('teachers.myworks.attendances.create',[
            'title' => 'Absensi',
            'journal' => Journal::where('kode_jurnal', request('journal'))->first(),
            // 'student' => Student::
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
        // dd(Journal::where('id', $request->journal_id)->first()->schedule->mclass->student);
        $students =  Journal::where('id', $request->journal_id)->first()->schedule->mclass->student;

        // dd($students);
        foreach ($students as $student) {
            $validatedData = $request->validate([
                'student_id-'.$student->id => ['required'],
                'ket-'.$student->id => ['required'],
                'journal_id' => ['required'],
            ]);
            $validatedData['student_id'] =  $request['student_id-'.$student->id];
            $validatedData['ket'] = $request['ket-'.$student->id];
            Attendance::create($validatedData);
        }

        Journal::where('id', $request->journal_id)
                ->update([
                    'statusInput' => $request->statusInput
                ]);


        return redirect('/myworks/attendances')->with('success', 'Absensi Berhasil Diinputkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        // return view('teachers.myworks.attendances.edit',[
        //     'title' => 'Ubah Absensi',
        //     'journal' => Journal::where('kode_jurnal', request('journal'))->first(),
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        // dd($request);
        $validatedData = $request->validate([
            'journal_id' => ['required', 'numeric'],
            'student_id' => ['required', 'numeric'],
            'ket' => ['required'],
        ]);

        Attendance::where('id', $attendance->id)
                    ->update($validatedData);
        
        return redirect('/myworks/attendances')->with('success', 'Absensi Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }

    public function showAttendance(Request $request)
    {
        // dd(request('journal_id'));
        return view('teachers.myworks.attendances.show',[
            'title' => "Detail Absensi",
            'journal' => Journal::where('kode_jurnal', request('journal'))->first(),
            'attendances' => Attendance::where('journal_id', request('journal_id'))->get(),
        ]);
    }

    public function editAttendance()
    {
        // dd(request('journal'));
        return view('teachers.myworks.attendances.edit',[
            'title' => "Ubah Absensi",
            'journal' => Journal::where('kode_jurnal', request('journal'))->first(),
            'attendances' => Attendance::where('journal_id', request('journal_id'))->get(),
        ]);
    }
}
