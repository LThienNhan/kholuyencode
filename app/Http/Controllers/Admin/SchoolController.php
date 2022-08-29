<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\SchoolService;
use App\Models\School;
use DB;

class SchoolController extends Controller
{
    protected $schoolService;

    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }

    public function index()
    {
    $schools = $this->schoolService->getShools();
    $kid = $this->schoolService->countKids();
    $class = $this->schoolService->countClass();
    $teacher = $this->schoolService->countTeacher();
    $parent = $this->schoolService->countParent();
    $lesson = $this->schoolService->countLesson();
    $img = $this->schoolService->countImg();
    $video = $this->schoolService->countVideo();
    $activite = $this->schoolService->countActivite();
    return view('admin.schools.index', compact('schools','kid','class','teacher','parent','lesson','img','video','activite'));
    }
}
