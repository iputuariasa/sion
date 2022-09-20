<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SearchCivitasController extends Controller
{
    public function searchStudents(){
        return view('teachers.civitas.search_students.index',[
            'title' => 'Cari Data Siswa',
            'students' => Student::latest()->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    public function searchTeachers(){
        return view('teachers.civitas.search_teachers.index',[
            'title' => 'Cari Data Guru',
            'teachers' => Teacher::latest()->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }
}
