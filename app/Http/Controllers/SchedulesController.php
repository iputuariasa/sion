<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Mclass;
use App\Models\Schedule;
use App\Models\schoolYear;
use App\Models\Semester;
use App\Models\Study;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(request('mclass'));
        $title = '';
        if (request('mclass')) {
            $mclass = Mclass::firstWhere('kode_kelas', request('mclass'));
            $title = ' Kelas ' . $mclass->nama_kelas;
        }
        
        return view('admins.schedules.index',[
            'title' => 'Data Jadwal' . $title,
            'classes' => Mclass::all(),
            'schedules' => Schedule::where('schoolYear_id', schoolYear::where('status', 'aktif')->first()->id)->where('semester_id', Semester::where('status', 'aktif')->first()->id)->orderBy('day_id', 'asc')->orderBy('jam_mulai', 'asc')->filter(request(['mclass']))->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.schedules.create',[
            'title' => 'Tambah Jadwal',
            'schoolYears' => schoolYear::where('status', 'aktif')->get(),
            'semesters' => Semester::where('status', 'aktif')->get(),
            'teachers' => Teacher::all(),
            'studies' => Study::all(),
            'classes' => Mclass::all(),
            'days' => Day::all(),
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
        $validatedData = $request->validate([
            'kode_jadwal' => ['required', 'unique:schedules'],
            'schoolYear_id' => ['required','numeric'],
            'semester_id' => ['required','numeric'],
            'teacher_id' => ['required','numeric'],
            'study_id' => ['required','numeric'],
            'mclass_id' => ['required','numeric'],
            'day_id' => ['required','numeric'],
            'jam_mulai' => ['required'],
            'jam_selesai' => ['required'],
            'jamke' => ['required'],
        ]);
        
        Schedule::create($validatedData);
        
        return redirect('/schedules')->with('success','Jadwal Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        // dd($schedule->student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        return view('admins.schedules.edit',[
            'title' => 'Ubah Jadwal',
            'schedule' => $schedule,
            // 'schoolYears' => schoolYear::where('status', 'aktif')->get(),
            'semesters' => Semester::where('status', 'aktif')->get(),
            'teachers' => Teacher::all(),
            'studies' => Study::all(),
            'classes' => Mclass::all(),
            'days' => Day::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        dd($request);
        $validatedData = $request->validate([
            'kode_jadwal' => ['required'],
            'schoolYear_id' => ['required','numeric'],
            'semester_id' => ['required','numeric'],
            'teacher_id' => ['required','numeric'],
            'study_id' => ['required','numeric'],
            'mclass_id' => ['required','numeric'],
            'day_id' => ['required','numeric'],
            'jam_mulai' => ['required'],
            'jam_selesai' => ['required'],
            'jamke' => ['required'],
        ]);

        Schedule::where('kode_jadwal', $schedule->kode_jadwal)
                    ->update($validatedData);

        return redirect('/schedules?mclass='.$schedule->mclass->kode_kelas)->with('success','Jadwal Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        // dd($schedule);
        Schedule::destroy('id', $schedule->id);

        return redirect('/schedules?mclass='.$schedule->mclass->kode_kelas)->with('success','Jadwal Berhasil Dihapus!');
    }
}
