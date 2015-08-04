<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashBoardController extends Controller
{
    public function getIndex()
    {
        return view('back.layouts.base');
    }
}
