<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeautyDiagnosisController;

// My Beauty Device アプリのメインページ
Route::get('/', [BeautyDiagnosisController::class, 'index'])->name('home');

// 診断ページ（同じ内容）
Route::get('/beauty-diagnosis', [BeautyDiagnosisController::class, 'index'])->name('beauty.diagnosis');
