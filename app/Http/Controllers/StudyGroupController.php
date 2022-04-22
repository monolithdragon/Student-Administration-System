<?php

namespace App\Http\Controllers;

use App\Models\StudyGroup;
use Illuminate\Http\Request;

class StudyGroupController extends Controller
{
    public function index()
    {
        $study_groups = StudyGroup::all();
        return view('admin.study_groups', [
            'study_groups' => $study_groups
        ]);
    }
}
