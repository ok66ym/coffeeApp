<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// アプリについての説明
class InstructController extends Controller
{
    public function instruction() {
        return view('about.instruction');
    }
}
