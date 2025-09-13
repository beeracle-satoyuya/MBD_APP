<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeautyDiagnosisController extends Controller
{
    public function index()
    {
        return view('beauty-diagnosis')->layout('layouts.beauty-app');
    }
}
