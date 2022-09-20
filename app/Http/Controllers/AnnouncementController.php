<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.announcement.index',[
            'title' => 'Data Pengumuman',
            'announcements' => Announcement::latest()->filter(request(['search']))->paginate(10)->withQueryString(),
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
            'judul' => ['required'],
            'ket' => ['required'],
            'dokumen' => ['mimes:doc,docx,pdf,xls,xlxs']
        ]);
        if ($request->dokumen) {
            $validatedData['dokumen'] = $request->file('dokumen')->store('document');
        }

        Announcement::create($validatedData);

        return redirect('/announcements')->with('success', 'Pengumuman Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        return view('admins.announcement.show',[
            'title' => 'Detail Pengumuman',
            'announcement' => $announcement,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        return view('admins.announcement.edit',[
            'title' => 'Ubah Data',
            'announcement' => $announcement,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        // dd($announcement->id);
        $validatedData = $request->validate([
            'judul' => ['required'],
            'ket' => ['required'],
            'dokumen' => ['mimes:doc,docx,pdf,xls,xlxs'],
        ]);

        if($request->file('dokumen')){
            if($request->old_dokumen){
                Storage::delete($request->old_dokumen);
            }
            $validatedData['dokumen'] = $request->file('dokumen')->store('document');
        }

        Announcement::where('id', $announcement->id)
                ->update($validatedData);
        
        return redirect('/announcements')->with('success', 'Pengumuman Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        if($announcement->dokumen){
            Storage::delete($announcement->dokumen);
        }
        Announcement::destroy($announcement->id);

        return redirect('/announcements')->with('success', 'Pengumuman Berhasil Dihapus!');
    }

    public function showTeachers()
    {
        return view('teachers.announcement.index',[
            'title' => 'Pengumuman',
            'announcements' => Announcement::latest()->filter(request(['search']))->paginate(5)->withQueryString(),
        ]);
    }
}
