<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TabController extends Controller
{
    public function students()
    {
        return view('admin.students');
    }

    public function studyGroups()
    {
        return view('admin.study_groups');
    }
}
