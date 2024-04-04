<?php

namespace App\Http\Controllers;
use App\Models\SideJob;
use Illuminate\View\View;

use Illuminate\Http\Request;

class SideJobController extends Controller
{
    $sidejob = SideJob::latest()->paginate(10);

    return view("", compact("sidejob"));
}
